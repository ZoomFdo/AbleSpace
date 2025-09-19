<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Coupon::all();
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
            'code'       => 'required|string|max:50|unique:coupons,code',
            'discount'   => 'required|numeric|min:1|max:100', // у відсотках
            'expires_at' => 'nullable|date|after:today',
        ]);

        $coupon = Coupon::create($data);

        return response()->json($coupon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Coupon::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $data = $request->validate([
            'code'       => 'sometimes|required|string|max:50|unique:coupons,code,' . $coupon->id,
            'discount'   => 'sometimes|required|numeric|min:1|max:100',
            'expires_at' => 'nullable|date|after:today',
        ]);

        $coupon->update($data);

        return response()->json($coupon, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return response()->json(null, 204);
    }


     /**
     * Перевірка купона (для фронтенду при оформленні замовлення)
     */
    public function validateCoupon(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string'
        ]);

        $coupon = Coupon::where('code', $data['code'])
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return response()->json(['message' => 'Coupon is invalid or expired'], 404);
        }

        return response()->json($coupon, 200);
    }
}
