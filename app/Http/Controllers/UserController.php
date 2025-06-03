<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->when(request('sort') === 'town', function (Builder $query) {
                if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
                    $query->orderByRaw('town is null')
                        ->orderBy('town', request('direction'));
                }

                if (config('database.default') === 'pgsql') {
                    $query->orderByRaw('town '.request('direction').' nulls last');
                }
            })
            ->orderBy('name')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
