<?php

namespace App\Http\Controllers;

use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $statuses = (object) [];
        $statuses->requested = Feature::where('status', 'Requested')->count();
        $statuses->planned = Feature::where('status', 'Planned')->count();
        $statuses->completed = Feature::where('status', 'Completed')->count();

        $features = Feature::query()
            ->withCount('comments')
            ->paginate();

        return view('features.index', [
            'features' => $features,
            'statuses' => $statuses,
        ]);
    }
}
