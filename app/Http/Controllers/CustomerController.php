<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        // Login user manually - only to test
        Auth::login(User::where('name', 'Sarah Seller')->first());

        $customers = Customer::query()
            ->with('salesRep')
            ->visibleTo(Auth::user())
            ->orderBy('name')
            ->paginate();

        return view('customers.index', ['customers' => $customers]);
    }
}
