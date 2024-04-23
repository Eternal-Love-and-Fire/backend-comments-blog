<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json([
            'comments' => $comments,
            'message' => 'Retrieved all comments successfully.'
        ]);
    }

    public function show($id)
    {
        $comment = Comment::with('subComments.user')->find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json([
            'comment' => $comment,
            // 'sub_comments' => $comment->subComments->map(function ($subComment) {
            //     return [
            //         'sub_comment' => $subComment,
            //         'user' => $subComment->user,
            //     ];
            // }),
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'body' => 'required|string',
        ]);

        $comment = Comment::create($credentials);

        return response()->json([
            'comment' => $comment,
            'message' => 'Comment created successfully'
        ]);
    }
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $credentials = $request->validate([
            'body' => 'required|string',
        ]);

        $comment->update($credentials);

        return response()->json([
            'comment' => $comment,
            'message' => 'Comment updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
