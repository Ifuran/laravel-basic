<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts", [PostController::class, "findAll"]);
Route::get("/posts/{postId}", [PostController::class, "findOne"]);
Route::post("/posts", [PostController::class, "insertOne"]);
Route::put("/posts/{postId}", [PostController::class, "updateOne"]);
Route::delete("/posts/{postId}", [PostController::class, "deleteOne"]);

Route::get("/comments", [CommentController::class, "findAll"]);

Route::post("/members/register", [MemberController::class, "register"]);
Route::post("/members/login", [MemberController::class, "login"]);
Route::get("/members/profile", [MemberController::class, "profile"])->middleware([CheckToken::class]);
Route::get("/members/report", [MemberController::class, "report"])->middleware([
    CheckToken::class,
    CheckRole::class
]);
