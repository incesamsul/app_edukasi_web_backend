<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use App\Models\FavoritModel;
use App\Models\KritikSaranModel;
use App\Models\KuisionerModel;
use App\Models\LowonganModel;
use App\Models\TestimoniModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function userProfile()
    {
        return view('pages.halaman_depan.profile');
    }
    public function layanan()
    {
        return view('pages.halaman_depan.layanan');
    }

    public function penilaian()
    {
        return view('pages.halaman_depan.penilaian');
    }

    public function favorit()
    {
        $data['info'] = DB::table('favorit')
        ->Join('info','info.id_info','=','favorit.id_info')
        ->where('favorit.id_user', auth()->user()->id)
        ->get();
        return view('pages.halaman_depan.favorit', $data);
    }

    public function tambahFavorit(Request $request) {
        $favorit = FavoritModel::where([
            'id_user' => auth()->user()->id,
            'id_info' => $request->id_info
        ])->first();

        if(!$favorit){
            FavoritModel::create([
                'id_user' => auth()->user()->id,
                'id_info' => $request->id_info
            ]);
            return 1;
        }
        return 0;

    }

    public function hapusFavorit(Request $request)
    {
        FavoritModel::where([
            'id_user' => auth()->user()->id,
            'id_info' => $request->id_info
        ])->delete();
        return 1;
    }
}



