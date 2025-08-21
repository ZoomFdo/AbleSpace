<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAuth;

class UserAuthController extends Controller
{
    
    public function index()
    {
        return UserAuth::all();
    }

    public function create()
    {
        // This method can be used to return a view for creating a new UserAuth
        // Not typically used in API controllers
    }

    public function store(Request $request)
    {
        $auth = UserAuth::create($request->all());
        return response()->json($auth, 201);
    }

    
    public function show($id)
    {
        return UserAuth::findOrFail($id);
    }

    
    public function update(Request $request, $id)
    {
        $auth = UserAuth::findOrFail($id);
        $auth->update($request->all());
        return response()->json($auth, 200);
    }

    
    public function destroy($id)
    {
        UserAuth::destroy($id);
        return response()->json(null, 204);
    }
}
