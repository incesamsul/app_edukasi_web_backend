<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Info;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($idInfo)
    {
        $info = Info::where('id_info', $idInfo);

        if (!$info->first()) {
            return response([
                'message' => 'info tidak di temukan'
            ], 403);
        }

        return response([
            'info' => $info->comments->with('user:id, name, image')->get()
        ], 200);
    }

    public function store(Request $request, $idInfo)
    {
        $info = Info::where('id_info', $idInfo);

        if (!$info->first()) {
            return response([
                'message' => 'info tidak di temukan'
            ], 403);
        }

        $attrs = $request->validate([
            'comment' => 'required|string'
        ]);

        Comment::create([
            'comment' => $attrs['comment'],
            'id_info' => $idInfo,
            'usre_id' => auth()->user()->id
        ]);

        return response([
            'message' => 'comment tersimpan'
        ], 200);
    }


    public function update(Request $request, $idComment)
    {
        $comment = Comment::where('id_comment', $idComment);

        if (!$comment->first()) {
            return response([
                'message' => 'Komentar tidak di temukan'
            ], 403);
        }

        $attrs = $request->validate([
            'comment' => 'required|string'
        ]);

        $comment->update([
            'comment' => $attrs['comment'],
        ]);

        return response([
            'message' => 'comment terupdate'
        ], 200);
    }


    public function destroy($idComment)
    {
        $comment = Comment::where('id_comment', $idComment);

        if (!$comment->first()) {
            return response([
                'message' => 'Komentar tidak di temukan'
            ], 403);
        }


        $comment->delete();

        return response([
            'message' => 'comment terhapus'
        ], 200);
    }
}
