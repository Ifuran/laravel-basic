<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function findAll()
    {
        // $posts = DB::table("posts")->get();
        $posts = Post::get();
        return response($posts, 200,);
    }

    public function findOne(Request $request)
    {
        $postId = $request->route("postId");
        // $post = DB::table("posts")->where("id", $postId)->get();
        $post = Post::with("comment")->where("id", $postId)->first();
        return response($post, 200);
    }

    public function insertOne(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        DB::table("posts")->insert([
            "title" => $title,
            "description" => $description
        ]);
        return response("Data inserted successfully", 201);
    }

    public function updateOne(Request $request)
    {
        $postId = $request->route("postId");
        $title = $request->title;
        $description = $request->description;
        DB::table("posts")->where("id", $postId)->update([
            "title" => $title,
            "description" => $description
        ]);
        return response("Data updated successfully", 200);
    }

    public function deleteOne(Request $request)
    {
        $postId = $request->route("postId");
        // DB::table("posts")->where("id", $postId)->delete();
        Post::where("id", $postId)->delete();
        return response("Data deleted successfully", 200);
    }
}
