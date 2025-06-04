<?php

namespace App\Models;

use App\Enums\FeatureStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Feature extends Model
{
    /** @use HasFactory<\Database\Factories\FeatureFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => FeatureStatus::class,
        ];
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function scopeOrderByStatus(Builder $query, string $direction): void
    {
        $query->orderBy(DB::raw('
            case
                when status = "Requested" then 1
                when status = "Approved" then 2
                when status = "Completed" then 3
            end
        '), $direction);
    }

    public function scopeOrderByActivity(Builder $query, string $direction): void
    {
        $query->orderBy(
            DB::raw('-(votes_count + (comments_count * 2))'),
            $direction
        );
    }
}
