<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return Cart::with('product')
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
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        //Update quantity, if the item is already in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $data['product_id'])
            ->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $data['quantity'],
            ]);
        } else {
            $cartItem = Cart::create([
                'user_id'    => $user->id,
                'product_id' => $data['product_id'],
                'quantity'   => $data['quantity'],
            ]);
        }

        return response()->json($cartItem, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();

        return Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->with('product')
            ->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
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

        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->update($data);

        return response()->json($cartItem, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return response()->json(null, 204);
    }
}
