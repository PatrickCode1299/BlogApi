<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogPosts;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index($blog_id)
    {
        return BlogPosts::where('blog_id', $blog_id)->with('PostLike', 'PostComment')->get();
    }


    public function store(Request $request, $blog_id)
    {
        $data = $request->validate([
            'blog_post_title' => 'required|string',
            'blog_post_content' => 'required|string'
        ]);
        $data['blog_id'] = $blog_id;
        return BlogPosts::create($data);
    }


    public function show($blog_id, $id)
    {
        return BlogPosts::where('blog_id', $blog_id)
            ->where('id', $id)
            ->with('PostLike', 'PostComment')
            ->firstOrFail();
    }

    public function update(Request $request, $blog_id, $id)
    {
        $post = BlogPosts::where('blog_id', $blog_id)->findOrFail($id);
        $post->update($request->only('blog_post_title', 'blog_post_content'));
        return $post;
    }


    public function destroy($blog_id, $id)
    {
        return BlogPosts::where('blog_id', $blog_id)->where('id', $id)->delete();
    }


    public function like($id)
    {
        $post = BlogPosts::findOrFail($id);
        $post->PostLike()->create(['like_id' => auth()->id() ?? 1]);
        return ['message' => 'Post liked successfully'];
    }


    public function comment(Request $request, $id)
    {
        $post = BlogPosts::findOrFail($id);
        $post->PostComment()->create([
            'comment_id' => auth()->id() ?? 1,
            'comments' => $request->input('comment')
        ]);
        return ['message' => 'Comment added successfully'];
    }

}
