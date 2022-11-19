<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    # membuat fitur register
    public function register(Request $request){
        # menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        # menginput data ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User Created Successfully'
        ];

        # mengembalikan data (json) dan code 200
        return response()->json($data, 200);
    }

    # membuat fitur login
    public function login(Request $request){
        # menangkap inputan user
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        # mengambil data user (DB)
        $user = User::where('email', $input['email'])->first();

        # membandingkan input user dengan data user (DB)
        $isLoginSuccessfully = ($input['email'] == $user->email && Hash::check($input['password'], $user->password));

        if($isLoginSuccessfully) {
            # membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Succesful',
                'token' => $token->plainTextToken
            ];

            # mengembalikan data (json) dan code 200
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Email or Password Wrong'
            ];

            # mengembalikan data (json) dan code 401
            return response()->json($data, 401);
        }
    }
}
