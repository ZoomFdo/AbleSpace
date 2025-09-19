<?php

namespace App\Http\Controllers\Api;

use App\Models\CartProduct;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return CartProduct::with('product')
            ->whereHas('cart', fn($q) => $q->where('user_id', $user->id))
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
    public function store(Request $request) //11111111111111111111111111111111
    {
        $user = $request->user();

        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Find the user's basket (or create, if does not exist)
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        //Сheck if the item in the cart
        $cartProduct = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $data['product_id'])
            ->first();

        if ($cartProduct) {
            $cartProduct->update([
                'quantity' => $cartProduct->quantity + $data['quantity'],
            ]);
        } else {
            $cartProduct = CartProduct::create([
                'cart_id'    => $cart->id,
                'product_id' => $data['product_id'],
                'quantity'   => $data['quantity'],
            ]);
        }

        return response()->json($cartProduct->load('product'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();

        return CartProduct::with('product')
            ->where('id', $id)
            ->whereHas('cart', fn($q) => $q->where('user_id', $user->id))
            ->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();

        $data = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartProduct = CartProduct::where('id', $id)
            ->whereHas('cart', fn($q) => $q->where('user_id', $user->id))
            ->firstOrFail();

        $cartProduct->update($data);

        return response()->json($cartProduct->load('product'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        $cartProduct = CartProduct::where('id', $id)
            ->whereHas('cart', fn($q) => $q->where('user_id', $user->id))
            ->firstOrFail();

        $cartProduct->delete();

        return response()->json(null, 204);
    }
}
