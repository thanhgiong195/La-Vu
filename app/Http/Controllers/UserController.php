<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        $user = Auth::user();
        return response()->json($user);
    }

    public function edit() {
        $user = Auth::user();
        return response()->json($user);
    }

    public function update(Request $request) {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if(empty($request->password)){
            $user->update($request->except('password'));
        } else {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return response()->json($user);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }
        return response([
            'status' => 'success'
        ])->header('Authorization', $token);
    }

    public function register(Request $request) {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        return response([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
}
