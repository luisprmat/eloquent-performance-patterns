<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $years = Post::query()
            ->with('author')
            ->latest('published_at')
            ->get()
            ->groupBy(fn (Post $post) => $post->published_at->year);

        return view('posts.index', ['years' => $years]);
    }
}
