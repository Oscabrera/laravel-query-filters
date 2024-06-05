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
        static::addGlobalScope('applyFilters', function (Builder $builder, QueryFilters $queryOptions) {
            $queryOptions->apply($builder);
        });
    }

    /**
     * Scope a query to apply the given QueryOptions.
     *
     * @param Builder $query
     * @param QueryFilters $queryOptions
     * @return Builder
     */
    public function scopeApplyFilters(Builder $query, QueryFilters $queryOptions): Builder
    {
        $queryOptions->apply($query);
        return $query;
    }
}
