<?php

namespace App\Http\Controllers;

use App\Models\AccessibilitySettings;
use Illuminate\Http\Request;

class AccessibilitySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AccessibilitySettings::all();
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
        $accessibilitySettings = AccessibilitySettings::create($request->all());
        return response()->json($accessibilitySettings, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return AccessibilitySettings::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessibilitySettings $accessibilitySettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $accessibilitySettings = AccessibilitySettings::findOrFail($id);
        $accessibilitySettings->update($request->all());
        return response()->json($accessibilitySettings, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        AccessibilitySettings::destroy($id);
        return response()->json(null, 204);
    }
}
