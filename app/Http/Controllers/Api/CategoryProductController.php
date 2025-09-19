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
        return CategoryProduct::with(['category', 'product'])->paginate(10);
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
        //Validate
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id'  => 'required|exists:products,id',
        ]);

        //Preventing duplicate connections
        $exists = CategoryProduct::where('category_id', $data['category_id'])
            ->where('product_id', $data['product_id'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'This relation already exists'], 409);
        }

        $categoryProduct = CategoryProduct::create($data);

        return response()->json($categoryProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CategoryProduct::with(['category', 'product'])->findOrFail($id);
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

        //Validate
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_id'  => 'required|exists:products,id',
        ]);

        $categoryProduct->update($data);

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
