<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderByLastLogin()
            ->withLastLogin()
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
