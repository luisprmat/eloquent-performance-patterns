<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderBy(Company::select('name')
                ->whereColumn('user_id', 'users.id')
                ->orderBy('name')
                ->take(1)
            )
            ->with('company')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
