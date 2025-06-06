<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with('author')
            ->latest('published_at')
            ->paginate();

        return view('posts.index', ['posts' => $posts]);
    }
}
