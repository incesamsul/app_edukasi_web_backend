<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalEvaluasi extends Model
{
    use HasFactory;
    protected $table = 'soal_evaluasi';
    protected $guarded = ['id_soal_evaluasi'];
}
