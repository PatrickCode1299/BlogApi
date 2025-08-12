<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    //
    protected $fillable = [
        "comments",
        "comment_id",
        "post_id"
    ];
    public function BlogPosts(){
        return $this->belongsTo(BlogPosts::class);
    }
}
