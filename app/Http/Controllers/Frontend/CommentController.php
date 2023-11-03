<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function comment(Request $request)
    {
        Comment::create([
            'recipe_id' => $request->recipe_id,
            'name' => $request->name,
            'comment_text' => $request->comment_text,
        ]);

        return ResponseHelper::Out('success', 'Comment', 200);
    }
    function get($recipe_id)
    {
        return Comment::with('child')->where('p_id', 0)->where('recipe_id', $recipe_id)->get();
    }
    function getReplyByCommentId($p_id)
    {
        return Comment::where('p_id', $p_id)->get();
    }
    function commentReply(Request $request)
    {
        Comment::create([
            'p_id' => $request->p_id,
            'recipe_id' => $request->recipe_id,
            'name' => $request->name,
            'comment_text' => $request->comment_text,
        ]);

        return ResponseHelper::Out('success', 'Comment', 200);
    }
}
