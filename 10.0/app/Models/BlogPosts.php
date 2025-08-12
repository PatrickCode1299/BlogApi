<?php

namespace App\Models;
use App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    //

    protected $fillable = [
        "blog_post_title",
        "blog_post_content",

    ];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
