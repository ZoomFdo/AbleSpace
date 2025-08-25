<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderProduct::all();
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
        $orderProduct = OrderProduct::create($request->all());
        return response()->json($orderProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return OrderProduct::findOrFail($id);
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
        $orderProduct->update($request->all());
        return response()->json($orderProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        OrderProduct::destroy($id);
        return response()->json(null, 204);
    }
}
