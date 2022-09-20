<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InfoModel extends Model
{
    protected $table = 'info';
    protected $guarded = ['id_info'];
    use HasFactory;
}
