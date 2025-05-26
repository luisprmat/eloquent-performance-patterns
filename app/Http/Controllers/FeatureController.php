<?php

namespace App\Http\Controllers;

use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $statuses = (object) [];
        $statuses->requested = '-';
        $statuses->planned = '-';
        $statuses->completed = '-';

        $features = Feature::query()
            ->withCount('comments')
            ->paginate();

        return view('features.index', [
            'features' => $features,
            'statuses' => $statuses,
        ]);
    }
}
