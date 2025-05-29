<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header("Authorization");
        if (!$token) {
            return response([
                "message" => "Unauthenticate"
            ], 401);
        }
        $jwt_token = explode(" ", $token)[1];
        $key = env("JWT_SECRET");
        $hash = "HS256";

        $payload = JWT::decode($jwt_token, new Key($key, $hash));
        $member = Member::where("id", $payload->id)->first();
        if (!$member) {
            return response([
                "message" => "Unauthenticate",
            ], 401);
        }

        $request["id"] = $member->id;
        return $next($request);
    }
}
