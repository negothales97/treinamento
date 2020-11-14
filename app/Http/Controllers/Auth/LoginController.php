<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 401);
        }

        $user = User::firstWhere('email', request('email'));
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if (!Hash::check(request('password'), $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        Auth::login($user);

        $token = $user->createToken('customerToken')->accessToken;

        return response()->json([
            'success' => [
                'token' => $token,
                'user' => $user,
            ],
        ]);
    }
}
