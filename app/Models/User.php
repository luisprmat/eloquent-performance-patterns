<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QBuilder;
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeSearch(Builder $query, ?string $terms = null)
    {
        if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
            collect(str_getcsv($terms, ' ', escape: '\\'))->filter()->each(function ($term) use ($query) {
                $term = preg_replace('/[^A-Za-z0-9]/', '', $term).'%';

                $query->whereIn('id', function (QBuilder $query) use ($term) {
                    $query->select('id')
                        ->from(function (QBuilder $query) use ($term) {
                            $query->select('id')
                                ->from('users')
                                ->whereRaw("regexp_replace(first_name, '[^A-Za-z0-9]', '') like ?", [$term])
                                ->OrWhereRaw("regexp_replace(last_name, '[^A-Za-z0-9]', '') like ?", [$term])
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('companies', 'users.company_id', '=', 'companies.id')
                                        ->whereRaw("regexp_replace(companies.name, '[^A-Za-z0-9]', '') like ?", [$term])
                                );
                        }, 'matches');
                });
            });
        }

        if (config('database.default') === 'pgsql') {
            collect(str_getcsv($terms, ' ', escape: '\\'))->filter()->each(function ($term) use ($query) {
                $term = $term.'%';

                $query->whereIn('id', function (QBuilder $query) use ($term) {
                    $query->select('id')
                        ->from(function (QBuilder $query) use ($term) {
                            $query->select('id')
                                ->from('users')
                                ->whereRaw("regexp_replace(first_name, '[^A-Za-z0-9]', '') ilike ?", [$term])
                                ->OrWhereRaw("regexp_replace(last_name, '[^A-Za-z0-9]', '') ilike ?", [$term])
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('companies', 'users.company_id', '=', 'companies.id')
                                        ->whereRaw("regexp_replace(companies.name, '[^A-Za-z0-9]', '') ilike ?", [$term])
                                );
                        }, 'matches');
                });
            });
        }
    }
}
