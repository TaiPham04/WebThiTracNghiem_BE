<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /api/users - Lấy tất cả users
    public function index()
    {
        $users = User::all(['id', 'name']);
        return response()->json($users);
    }

    // GET /api/users/{id} - Lấy user theo id
    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name
        ]);
    }
}