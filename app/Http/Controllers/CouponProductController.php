<?php

namespace App\Http\Controllers;

use App\Models\CouponProduct;
use Illuminate\Http\Request;

class CouponProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CouponProduct::all();
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
        $couponProduct = CouponProduct::create($request->all());
        return response()->json($couponProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CouponProduct::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CouponProduct $couponProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $couponProduct = CouponProduct::findOrFail($id);
        $couponProduct->update($request->all());
        return response()->json($couponProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CouponProduct::destroy($id);
        return response()->json(null, 204);
    }
}
