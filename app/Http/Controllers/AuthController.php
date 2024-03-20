<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $userEmail = $request->input('email');
        $userPassword = $request->input('password');
        $user = User::where('email', $userEmail)->where('password', $userPassword)->first();
        
        return response()->json(['user' => $user], 201); // 201 Created status code

    }
}
