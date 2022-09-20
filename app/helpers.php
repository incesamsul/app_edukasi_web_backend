<?php

use App\Models\FavoritModel;
use App\Models\Info;
use App\Models\InfoModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\isNull;

function getKategoriMenu()
{
    return KategoriModel::all();
}

function getInfoPerKategori($idKategori)
{
    return Info::where('id_kategori', $idKategori)->get();
}

function getNamaKategoriById($idKategori)
{
    return KategoriModel::where('id_kategori', $idKategori)->first();
}

function getNamaInfoById($idInfo)
{
    return InfoModel::where('id_info', $idInfo)->first();
}


function isThisMyFavorit($idInfo)
{
    return FavoritModel::where([
        'id_user' => auth()->user()->id,
        'id_info' => $idInfo
    ])->first();
}

function removeSpace($string)
{
    return str_replace(" ", "", $string);
}

function getUserRoleName($userRoleId)
{
    return DB::table('users')
        ->Join('role', 'role.id_role', '=', 'users.id_role')
        ->where('users.id_role', $userRoleId)
        ->select('nama_role')
        ->first()->nama_role;
}


function sweetAlert($pesan, $tipe)
{
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
        Swal.fire(
            "' . $pesan . '",
            "proses berhasil di lakukan",
            "' . $tipe . '",
        );
    })</script>';
}
