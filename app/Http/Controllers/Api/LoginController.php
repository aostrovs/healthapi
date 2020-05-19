<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->all())) {
            $user = User::where("email", $request->email)->first();
            $token = $user->createToken('authentication-name');
            return response()->json([
                "token" => $token->plainTextToken
            ]);
        }
        return response()->json([
            "token" => null
        ]);
    }
    public function valid_token()
    {
        return response()->json([
            "authenticated" => true
        ]);
    }
    public function logout()
    {
        $user = auth()->user();
        $token = $user->currentAccessToken();
        $token->delete();

        return response()->json([
            "logged_out" => true
        ]);
    }
}
