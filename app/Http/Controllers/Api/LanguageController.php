<?php

namespace App\Http\Controllers\Api;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Language::all(), 200);
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
        $validated = $request->validate([
            'code' => 'required|string|max:5|unique:languages,code',
            'name' => 'required|string|max:100',
        ]);

        $language = Language::create($validated);

        return response()->json([
            'message' => 'Language created successfully',
            'data' => $language,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $language = Language::findOrFail($id);

        return response()->json($language, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);

        $validated = $request->validate([
            'code' => 'sometimes|string|max:5|unique:languages,code,' . $id,
            'name' => 'sometimes|string|max:100',
        ]);

        $language->update($validated);

        return response()->json([
            'message' => 'Language updated successfully',
            'data' => $language,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return response()->json([
            'message' => 'Language deleted successfully'
        ], 204);
    }
}
