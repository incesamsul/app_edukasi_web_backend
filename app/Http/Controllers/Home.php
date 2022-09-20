<?php

namespace App\Http\Controllers;

use App\Models\InfoModel;
use App\Models\KategoriModel;
use App\Models\User;
use Illuminate\Http\Request;


class Home extends Controller
{

    protected $userModel;
    protected $testimoniModel;
    protected $profileUserModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function halamanDepan()
    {
        return view('pages.halaman_depan.index');
    }

    public function info($idKategori)
    {
        $data['kategori'] = KategoriModel::where('id_kategori',$idKategori)->first();
        $data['info'] = InfoModel::where('id_kategori', $idKategori)->get();
        return view('pages.halaman_depan.info', $data);
    }

    public function sejarah()
    {
        $data['info'] = InfoModel::where('kategori', 'sejarah')->get();
        return view('pages.halaman_depan.sejarah', $data);
    }

    public function pahlawan()
    {
        $data['info'] = InfoModel::where('kategori', 'pahlawan')->get();
        return view('pages.halaman_depan.pahlawan', $data);
    }

    public function gunung()
    {
        $data['info'] = InfoModel::where('kategori', 'gunung')->get();
        return view('pages.halaman_depan.gunung', $data);
    }

    public function wisata()
    {
        $data['info'] = InfoModel::where('kategori', 'wisata')->get();
        return view('pages.halaman_depan.wisata', $data);
    }

    public function kuliner()
    {
        $data['info'] = InfoModel::where('kategori', 'kuliner')->get();
        return view('pages.halaman_depan.kuliner', $data);
    }

    public function tari()
    {
        $data['info'] = InfoModel::where('kategori', 'tari')->get();
        return view('pages.halaman_depan.tari', $data);
    }

    public function study()
    {
        $data['info'] = InfoModel::where('kategori', 'study')->get();
        return view('pages.halaman_depan.study', $data);
    }

}
