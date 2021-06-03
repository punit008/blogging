<?php

namespace App\Models;
use App\Models\UserPost;

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

    function user_post(){
        return $this->belongsToMany(User::class,'user_post','user_id','post_id');
    }
}
