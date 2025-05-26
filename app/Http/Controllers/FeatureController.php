<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::query()
            ->withCount('comments')
            ->paginate();

        return view('features.index', [
            'features' => $features,
        ]);
    }

    public function show(Feature $feature): View
    {
        return view('features.show', ['feature' => $feature]);
    }
}
