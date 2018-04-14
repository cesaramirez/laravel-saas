<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'teams_enabled' => 'boolean',
    ];

    public function isForTeams()
    {
        return $this->teams_enabled === true;
    }

    /**
     * Scope a query to only active plans.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only users plans.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForUsers($query)
    {
        return $query->where('teams_enabled', false);
    }

    /**
     * Scope a query to only teams plans.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForTeams($query)
    {
        return $query->where('teams_enabled', true);
    }
}
