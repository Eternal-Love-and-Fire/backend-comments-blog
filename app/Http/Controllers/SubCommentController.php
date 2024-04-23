<?php

namespace App\Http\Controllers;

use App\Models\SubComment;
use Illuminate\Http\Request;

class SubCommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'comment_id' => 'required|integer|exists:comments,id',
            'body' => 'required|string',
        ]);

        $subcomment = SubComment::create($credentials);

        return response()->json([
            'subcomment' => $subcomment,
            'message' => 'Comment created successfully'
        ]);
    }
    public function update(Request $request, $id)
    {
        $subcomment = SubComment::find($id);
        if (!$subcomment) {
            return response()->json(['message' => 'SubComment not found'], 404);
        }

        $credentials = $request->validate([
            'body' => 'required|string',
        ]);

        $subcomment->update($credentials);

        return response()->json([
            'subcomment' => $subcomment,
            'message' => 'SubComment updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $subcomment = SubComment::find($id);
        if (!$subcomment) {
            return response()->json(['message' => 'SubComment not found'], 404);
        }

        $subcomment->delete();

        return response()->json(['message' => 'SubComment deleted successfully']);
    }
}
