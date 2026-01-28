<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display blog posts list.
     */
    public function index()
    {
        $posts = BlogPost::where('is_published', true)
            ->with('author')
            ->latest()
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    /**
     * Display single blog post.
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
            ->where('is_published', true)
            ->with('author')
            ->firstOrFail();

        $recentPosts = BlogPost::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'recentPosts'));
    }
}
