<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role = $request->role;

        $newMember = Member::create([
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "role" => $role
        ]);

        return response([
            "message" => "success",
            "data" => $newMember
        ], 201);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (!$email || !$password) {
            return response([
                "message" => "Email atau password tidak boleh kosong"
            ], 401);
        }

        $member = Member::where("email", $email)->first();
        if (!$member) {
            return response([
                "message" => "Email belum terdaftar"
            ], 401);
        }

        if (!Hash::check($password, $member->password)) {
            return response([
                "message" => "Email atau password salah"
            ], 401);
        }

        $key = env("JWT_SECRET");
        $payload = [
            "id" => $member->id,
            "iat" => time(),
        ];
        $hash = "HS256";
        $token = JWT::encode($payload, $key, $hash);

        return response([
            "message" => "Login berhasil",
            "data" => $token,
        ], 200);
    }

    public function profile(Request $request)
    {
        $member = Member::where("id", $request->id)->first();
        return response([
            "message" => "Berhasil akses profile",
            "data" => $member
        ]);
    }

    public function report(Request $request)
    {
        return response([
            "message" => "Berhasil akses report"
        ]);
    }
}
