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
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->orderBy('companies.name')
            ->with('company')
            ->paginate();

        return view('users.index', ['users' => $users]);
    }
}
