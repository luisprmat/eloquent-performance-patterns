<?php

namespace App\Http\Controllers;

use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::query()
            ->withCount('comments')
            ->paginate();

        return view('features.index', [
            'features' => $features,
        ]);
    }
}
