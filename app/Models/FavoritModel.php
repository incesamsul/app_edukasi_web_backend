<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FavoritModel extends Model
{
    protected $table = 'favorit';
    protected $guarded = ['id_favorit'];
    use HasFactory;
}
