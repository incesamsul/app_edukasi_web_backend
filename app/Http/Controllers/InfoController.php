<?php

namespace App\Http\Controllers;

use App\Models\InfoModel;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function detailInfo($idInfo)
    {
        return response(InfoModel::where('id_info', $idInfo)->get(), 200);
    }
}
