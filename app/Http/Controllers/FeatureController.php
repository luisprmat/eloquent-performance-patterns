<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::query()
            ->withCount('comments', 'votes')
            ->when(request('sort'), function (Builder $query, string $column) {
                return match ($column) {
                    'title' => $query->orderBy('title', request('direction')),
                    'status' => $query->orderByStatus(request('direction')),
                    'activity' => $query->orderByActivity(request('direction')),
                    default => $query,
                };
            })
            ->latest()
            ->paginate();

        return view('features.index', ['features' => $features]);
    }
}
