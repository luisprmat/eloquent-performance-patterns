<?php

namespace App\Providers;

use App\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        LengthAwarePaginator::class => Paginator::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use if connection is postgres
        Builder::macro('orderByNullsLast', function ($column, $direction = 'asc') {
            /** @var Builder $this */
            $column = $this->getGrammar()->wrap($column);
            $direction = strtolower($direction) === 'asc' ? 'asc' : 'desc';

            return $this->orderByRaw("$column $direction nulls last");
        });
    }
}
