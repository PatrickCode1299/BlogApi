<?php

namespace App\Models;
use App\Models\BlogPosts;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        "blog_name",
        "blog_category"
    ];
  public function posts()
    {
        return $this->hasMany(BlogPosts::class); // Singular class name
    }
}
