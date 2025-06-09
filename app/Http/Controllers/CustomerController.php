<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Region;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $regions = Region::all();

        $customers = Customer::query()
            ->get();

        return view('customers.index', [
            'customers' => $customers,
            'regions' => $regions,
        ]);
    }
}
