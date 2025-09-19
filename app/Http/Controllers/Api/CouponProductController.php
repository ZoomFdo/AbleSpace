<?php

namespace App\Http\Controllers\Api;

use App\Models\CouponProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CouponProduct::with(['coupon', 'product'])->get();
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
            'coupon_id' => 'required|exists:coupons,id',
            'product_id' => 'required|exists:products,id',
        ]);

        // Перевірка, щоб уникнути дубліката
        $exists = CouponProduct::where('coupon_id', $data['coupon_id'])
            ->where('product_id', $data['product_id'])
            ->first();

        if ($exists) {
            return response()->json(['message' => 'Цей купон вже застосований до товару'], 409);
        }

        $couponProduct = CouponProduct::create($data);

        return response()->json($couponProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return CouponProduct::with(['coupon', 'product'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CouponProduct $couponProduct)
    {
        //
    }

    /**
     * Оновити зв’язок (змінити товар чи купон).
     */
    public function update(Request $request, $id)
    {
        $couponProduct = CouponProduct::findOrFail($id);

        $data = $request->validate([
            'coupon_id' => 'required|exists:coupons,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $couponProduct->update($data);

        return response()->json($couponProduct, 200);
    }

    /**
     * Видалити зв’язок купон-товар
     */
    public function destroy($id)
    {
        $couponProduct = CouponProduct::findOrFail($id);
        $couponProduct->delete();

        return response()->json(null, 204);
    }
}
