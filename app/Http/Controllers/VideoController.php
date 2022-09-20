<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InfoModel;
use App\Models\KategoriModel;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return response(Video::orderBy('created_at', 'asc')->get(), 200);
    }
}
