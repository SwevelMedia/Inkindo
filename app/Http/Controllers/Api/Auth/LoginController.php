<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {       
            $user = Auth::user();
            $user->token = $user->createToken('auth_token')->plainTextToken;

            session()->put('token', $user->token);
            
            // return response($user);
            return response()->json(['message' => 'login berhasil','user' =>$user, session('token')], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
    public function logout(Request $request){
        dd($request);
         $input = $request->all();
    }
}
