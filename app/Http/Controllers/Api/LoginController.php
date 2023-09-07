<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
      return response()->json([
        'token' => Auth::user()->createToken('token')->plainTextToken,
        'message' => 'Login Success',
      ]);
    }

    return response()->json([
      'message' => 'Login Failed',
    ], 401);
  }
}
