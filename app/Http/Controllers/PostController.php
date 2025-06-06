<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with('author')
            ->when(request('search'), function (Builder $query, string $search): void {
                if (config('database.default') === 'mysql') {
                    $query->whereFullText(['title', 'body'], $search, ['mode' => 'boolean'])
                        ->selectRaw('*, match(title, body) against(? in boolean mode) as score', [$search]);
                }

                if (config('database.default') === 'sqlite') {
                    throw new \Exception('This lesson does not support SQLite.');
                }

                if (config('database.default') === 'pgsql') {
                    $search = implode(' | ', array_filter(explode(' ', $search)));

                    $query->selectRaw("*, ts_rank(searchable, to_tsquery('english', ?)) as score", [$search])
                        ->whereRaw("searchable @@ to_tsquery('english', ?)", [$search])
                        ->orderByRaw("ts_rank(searchable, to_tsquery('english', ?)) desc", [$search]);
                }

            }, function (Builder $query) {
                $query->latest('published_at');
            })
            ->paginate();

        return view('posts.index', ['posts' => $posts]);
    }
}
