<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->whereBirthdayThisWeek()
            ->orderByBirthday()
            ->orderBy('name')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
