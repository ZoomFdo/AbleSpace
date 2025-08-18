<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CartProduct::all();
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
        $cartProduct = CartProduct::create($request->all());
        return response()->json($cartProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CartProduct::findOrFail($id);
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
        $cartProduct = CartProduct::findOrFail($id);
        $cartProduct->update($request->all());
        return response()->json($cartProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CartProduct::destroy($id);
        return response()->json(null, 204);
    }
}
