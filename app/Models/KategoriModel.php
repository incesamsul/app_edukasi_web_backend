<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id_kategori'];
    use HasFactory;
}
