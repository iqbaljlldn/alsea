<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request) {
        //validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role_id' => 'required|exists:roles,id',
            'password'  => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format tidak sesuai',
            'email.unique' => 'Email sudah terpakai!',
            'role_id.required' => 'Jabatan harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) response()->json([
            'status' => false,
            'message' => $validator->errors()
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        //create
        $user = User::with('role')->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Register success',
            'data' => $user
        ]);
    }

    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format tidak sesuai',
            'password.required' => 'Password harus diisi'
        ]);

        if ($validator->fails()) response()->json([
            'status' => false,
            'message' => $validator->errors()
        ]);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'data' => [
                    'status' => 'false',
                    'message' => 'Email atau password tidak sesuai'
                ]
                ], 401);
        }

        $user = User::with('role')->where('email', $request->email)->first();

        return response()->json([
            'data' => [
                'status' => true,
                'data' => $user,
                'token' => $token
            ]
        ]);
    }
}
