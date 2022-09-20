<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $guarded = ['id_info'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_info', 'id_info');
    }

    public function like()
    {
        return $this->hasMany(Comment::class, 'id_info', 'id_info');
    }
}
