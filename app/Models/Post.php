<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{




    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function userMany(){
        return $this->hasMany(User::class);
    }
}
