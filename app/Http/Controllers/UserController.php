<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
  
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($userId)
    {
        return User::find($userId);
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($userId)
    {
        User::findOrFail($userId)->delete();
        return response('Deleted', 200);
    }    
    
    public function getUser($userId){
        $user= User::find($userId);
        return $user;
    }
}
