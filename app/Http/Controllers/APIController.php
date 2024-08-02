<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class APIController extends Controller
{
    public function getPosts()
    {
        $posts = Post::all();
        return response()->json(['data' => $posts], 200);
    }

    public function logout(Request $request) {
        //$request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $validate = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), 422);
        }

        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),    
            'token'   => $token   
        ], 200);

        // if (Auth::attempt($credentials)) {
        //     return response()->json([
        //         'token' =>
        //         'message' => 'Successfully logged in']
        //     );
        // }

        // return response()->json(['error' => 'Username or password are wrong!'], 401);
    }

}
