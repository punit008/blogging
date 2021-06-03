<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function user_post(){
        return $this->belongsToMany(User::class, 'user_post', 'post_id', 'user_id');
    }
}
