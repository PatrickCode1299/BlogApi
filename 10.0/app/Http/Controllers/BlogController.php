<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::with('posts')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'blog_name' => 'required|string',
            'blog_category' => 'required|string'
        ]);
        return Blog::create($data);
    }

    public function show($id)
    {
        return Blog::with('posts')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($request->only('blog_name', 'blog_category'));
        return $blog;
    }

    public function destroy($id)
    {
        return Blog::destroy($id);
    }
}
