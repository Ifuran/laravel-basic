<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->id;
        $member = Member::where("id", $id)->first();
        if (!$member) {
            return response([
                "message" => "Unauthorize"
            ], 401);
        }

        if ($member->role !== "admin") {
            return response([
                "message" => "Unauthorize"
            ], 403);
        }
        return $next($request);
    }
}
