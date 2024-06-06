<?php

namespace Oscabrera\QueryFilters\Trait;

use Closure;
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static addGlobalScope(string $string, Closure $param)
 */
trait GlobalQueryScopes
{
    /**
     * Boot the trait.
     */
    public static function bootGlobalQueryScopes(): void
    {
        static::addGlobalScope('applyFilters', function (Builder $builder, QueryFilters $queryFilters) {
            $queryFilters->apply($builder);
        });
    }

    /**
     * Scope a query to apply the given QueryFilters.
     *
     * @param Builder $query
     * @param QueryFilters $queryFilters
     * @return Builder
     */
    public function scopeApplyFilters(Builder $query, QueryFilters $queryFilters): Builder
    {
        $queryFilters->apply($query);
        return $query;
    }
}
