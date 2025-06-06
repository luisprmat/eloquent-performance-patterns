<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\View\View;

class StoreController extends Controller
{
    public function index(): View
    {
        $stores = Store::query()
            ->paginate();

        return view('stores.index', ['stores' => $stores]);
    }
}
