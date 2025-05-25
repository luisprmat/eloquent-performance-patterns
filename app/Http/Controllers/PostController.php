<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $years = Post::query()
            ->select('id', 'title', 'slug', 'published_at', 'author_id')
            ->with('author:id,name')
            ->latest('published_at')
            ->get()
            ->groupBy(fn (Post $post) => $post->published_at->year);

        return view('posts.index', ['years' => $years]);
    }
}
