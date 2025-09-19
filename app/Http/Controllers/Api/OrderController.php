<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return Order::with('items.product')
            ->where('user_id', $user->id)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method'   => 'required|string|max:50',
        ]);

        // Find user`s cart
        $cart = Cart::with('products')->where('user_id', $user->id)->first();

        if (!$cart || $cart->products->isEmpty()) {
            return response()->json(['error' => 'Cart is empty'], 400);
        }

        DB::beginTransaction();
        try {
            //create order
            $order = Order::create([
                'user_id'          => $user->id,
                'shipping_address' => $data['shipping_address'],
                'payment_method'   => $data['payment_method'],
                'status'           => 'pending',
                'total'            => $cart->products->sum(fn($p) => $p->pivot->quantity * $p->price),
            ]);

            //Transfer products from cart to order
            foreach ($cart->products as $product) {
                OrderProduct::create([
                    'order_id'   => $order->id,
                    'product_id' => $product->id,
                    'quantity'   => $product->pivot->quantity,
                    'price'      => $product->price,
                ]);
            }

            //clear cart
            $cart->products()->detach();

            DB::commit();

            return response()->json($order->load('items.product'), 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create order', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();

        return Order::with('items.product')
            ->where('user_id', $user->id)
            ->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|string|in:pending,paid,shipped,completed,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->update($data);

        return response()->json($order->load('items.product'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(null, 204);
    }
}
