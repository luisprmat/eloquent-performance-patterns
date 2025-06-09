<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Region;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        // To find the customers for a specific region:
        // $regions = Region::all();

        // $customers = Customer::query()
        //     ->inRegion(Region::where('name', 'The Prairies')->first())
        //     ->get();

        // To find the region from a random customer:
        $customers = Customer::inRandomOrder()->take(1)->get();
        $regions = Region::hasCustomer($customers->first())->get();

        return view('customers.index', [
            'customers' => $customers,
            'regions' => $regions,
        ]);
    }
}
