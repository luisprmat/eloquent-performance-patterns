<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->select('users.*')
            ->join('logins', 'logins.user_id', '=', 'users.id')
            ->groupBy('users.id')
            ->orderByRaw('max(logins.created_at) desc')
            ->withLastLogin()
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
