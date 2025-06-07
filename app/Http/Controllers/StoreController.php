<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function index(): View
    {
        $myLocation = [-79.47, 43.14];

        $stores = Store::query()
            ->selectDistanceTo($myLocation)
            ->withinDistanceTo($myLocation, 10_000) // 10 km
            ->orderByDistanceTo($myLocation)
            ->paginate();

        return view('stores.index', ['stores' => $stores]);
    }
}
