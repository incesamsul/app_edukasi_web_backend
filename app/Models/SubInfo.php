<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubInfo extends Model
{
    use HasFactory;
    protected $table = 'sub_info';
    protected $guarded = ['id_sub_info'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_info', 'id_info');
    }

    public function like()
    {
        return $this->hasMany(Comment::class, 'id_info', 'id_info');
    }
}
