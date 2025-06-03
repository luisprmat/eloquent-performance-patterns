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
                $query->orderByRaw('town is null')
                    ->orderBy('town', request('direction'));
            })
            ->orderBy('name')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
