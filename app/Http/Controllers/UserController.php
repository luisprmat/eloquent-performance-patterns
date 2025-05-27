<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::query()
            ->search($request->search)
            ->with('company')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
