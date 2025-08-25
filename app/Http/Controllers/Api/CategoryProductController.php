<?php

namespace App\Http\Controllers\Api;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryProduct::all();
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
        $categoryProduct = CategoryProduct::create($request->all());
        return response()->json($categoryProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CategoryProduct::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct->update($request->all());
        return response()->json($categoryProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CategoryProduct::destroy($id);
        return response()->json(null, 204);
    }
}
