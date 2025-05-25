<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->addSelect(['last_login_at' => Login::select('created_at')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1),
            ])
            ->orderBy('name')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
