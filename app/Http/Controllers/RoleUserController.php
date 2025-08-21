<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RoleUser::all();
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
        $roleUser = RoleUser::create($request->all());
        return response()->json($roleUser, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return RoleUser::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleUser $roleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roleUser = RoleUser::findOrFail($id);
        $roleUser->update($request->all());
        return response()->json($roleUser, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RoleUser::destroy($id);
        return response()->json(null, 204);
    }
}
