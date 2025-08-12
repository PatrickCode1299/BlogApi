<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $fillable =[
        "like_id",
        "post_id"
    ];
    //
     public function BlogPosts(){

        return $this->belongsTo(BlogPosts::class);
    }
}
