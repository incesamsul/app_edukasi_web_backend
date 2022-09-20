<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InfoModel;
use App\Models\KategoriModel;
use App\Models\SoalEvaluasi;
use Illuminate\Http\Request;

class SoalEvaluasiController extends Controller
{
    public function soal()
    {
        // return response(SoalEvaluasi::select('soal')->get(), 200);
        return response(SoalEvaluasi::all(), 200);
    }

    public function pilihan($idCategory)
    {
        return response(SoalEvaluasi::select('a', 'b', 'c', 'd')->get(), 200);
    }

    public function jawaban($idCategory)
    {
        return response(SoalEvaluasi::select('jawaban')->get(), 200);
    }

    public function quiz()
    {
        return response(SoalEvaluasi::all(), 200);
    }
}
