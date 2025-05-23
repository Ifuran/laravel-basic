<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function findAll()
    {
        $comments = Comment::with("post")->get();
        return response($comments, 200);
    }
}
