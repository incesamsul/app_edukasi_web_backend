<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InfoModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response(KategoriModel::orderBy('created_at', 'asc')->get(), 200);
    }

    public function info($idCategory)
    {
        return response(InfoModel::where('id_kategori', $idCategory)->get(), 200);
    }

    public function show($idCategory)
    {
        return response([
            'category' => Category::where('id_category', $idCategory)->withCount('comments', 'likes')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $attrs = $request->validate([
            'nama_kategori' => 'required|string',
            'deskripsi_kategori' => 'required|string',
            'gambar_kategori' => 'required|string',
        ]);

        // $image = $this->saveImage($request->image, 'posts');

        $category = Category::create([
            'nama_kategori' => $attrs['nama_kategori'],
            'deskripsi_kategori' => $attrs['deskripsi_kategori'],
            'gambar_kategori' => $attrs['gambar_kategori']
        ]);

        return response([
            'message' => 'category berasil di buat',
            'category' => $category
        ], 200);
    }

    public function update(Request $request, $idCategory)
    {
        $category = Category::where('id_category', $idCategory);

        if (!$category->first()) {
            return response([
                'message' => 'category tidak di temukan'
            ], 403);
        }

        $attrs = $request->validate([
            'nama_kategori' => 'required|string',
            'deskripsi_kategori' => 'required|string',
            'gambar_kategori' => 'required|string',
        ]);

        $category->update([
            'nama_kategori' => $attrs['nama_kategori'],
            'deskripsi_kategori' => $attrs['deskripsi_kategori'],
            'gambar_kategori' => $attrs['gambar_kategori'],
        ]);

        return response([
            'message' => 'category berasil di update',
            'category' => $category->first()
        ], 200);
    }


    public function destroy($idCategory)
    {
        $category = Category::where('id_category', $idCategory);

        if (!$category->first()) {
            return response([
                'message' => 'category tidak di temukan'
            ], 403);
        }

        // $category->com
    }
}
