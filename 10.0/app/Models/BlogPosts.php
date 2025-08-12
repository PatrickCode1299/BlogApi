<?php

namespace App\Models;
use App\Models\Blog;
use App\Models\PostComment;
use App\Models\PostLike;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    //

    protected $fillable = [
        "blog_post_title",
        "blog_post_content",
        "blog_post_id",

    ];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function PostComment(){
        return $this->hasMany(PostComment::class);
    }
     public function PostLike(){
        return $this->hasMany(PostLike::class);
    }
}
