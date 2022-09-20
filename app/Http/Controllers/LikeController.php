<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeOrUnlike($idInfo)
    {
        $info = Info::where('id_info', $idInfo);

        if (!$info->Info()) {
            return response([
                'message' => 'info tidak di temukan'
            ], 403);
        }

        $like = $info->like()->where('user_id', auth()->user()->id)->first();

        if (!$like) {
            Like::create([
                'id_info' => $idInfo,
                'user_id' => auth()->user()->id
            ]);
        }

        $like->delete();

        return response([
            'message' => 'disliked'
        ], 200);
    }
}
