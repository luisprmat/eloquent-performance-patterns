<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::query()
            ->withCount('comments', 'votes')
            ->latest()
            ->paginate();

        return view('features.index', ['features' => $features]);
    }
}
