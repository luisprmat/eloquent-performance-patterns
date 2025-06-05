<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeOrderByBirthday(Builder $query): void
    {
        if (config('database.default') === 'mysql') {
            $query->orderByRaw('date_format(birth_date, "%m-%d")');
        }

        if (config('database.default') === 'sqlite') {
            $query->orderByRaw('strftime("%m-%d", birth_date)');
        }

        if (config('database.default') === 'pgsql') {
            $query->orderByRaw('to_birthday(birth_date)');
        }
    }

    public function scopeWhereBirthdayThisWeek(Builder $query): void
    {
        $dates = now()->startOfWeek()
            ->daysUntil(now()->endOfWeek())
            ->map(fn ($date) => $date->format('m-d'));

        if (config('database.default') === 'mysql') {
            $query->whereRaw('date_format(birth_date, "%m-%d") in (?,?,?,?,?,?,?)', iterator_to_array($dates));
        }

        if (config('database.default') === 'sqlite') {
            $query->whereRaw('strftime("%m-%d", birth_date) in (?,?,?,?,?,?,?)', iterator_to_array($dates));
        }

        if (config('database.default') === 'pgsql') {
            $query->whereRaw('to_birthday(birth_date) in (?,?,?,?,?,?,?)', iterator_to_array($dates));
        }
    }
}
