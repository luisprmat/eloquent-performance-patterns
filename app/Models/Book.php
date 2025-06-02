<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'checkouts')
            ->using(Checkout::class)
            ->withPivot('borrowed_date');
    }

    public function lastCheckout(): BelongsTo
    {
        return $this->belongsTo(Checkout::class);
    }

    public function scopeWithLastCheckout(Builder $query): void
    {
        $query->addSelect(['last_checkout_id' => Checkout::select('checkouts.id')
            ->whereColumn('book_id', 'books.id')
            ->latest('borrowed_date')
            ->take(1),
        ])->with('lastCheckout');
    }
}
