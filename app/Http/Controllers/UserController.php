<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->with('company')
            ->simplePaginate();

        return view('users.index', ['users' => $users]);
    }
}
