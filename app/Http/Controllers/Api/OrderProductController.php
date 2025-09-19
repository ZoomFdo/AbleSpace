<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderProduct::with('product', 'order')->get();
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
        $data = $request->validate([
            'order_id'   => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'price'      => 'required|numeric|min:0',
            'quantity'   => 'required|integer|min:1',
        ]);

        $orderProduct = OrderProduct::create($data);

        return response()->json($orderProduct->load('product', 'order'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return OrderProduct::with('product', 'order')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $orderProduct = OrderProduct::findOrFail($id);

        $data = $request->validate([
            'price'    => 'sometimes|required|numeric|min:0',
            'quantity' => 'sometimes|required|integer|min:1',
        ]);

        $orderProduct->update($data);

        return response()->json($orderProduct->load('product', 'order'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderProduct = OrderProduct::findOrFail($id);
        $orderProduct->delete();

        return response()->json(null, 204);
    }
}
