<?php

declare(strict_types=1);

namespace Oscabrera\QueryFilters;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Oscabrera\QueryFilters\Utilities\QueryFilters;

class QueryFiltersServiceProvider extends ServiceProvider
{
    /**
     * Registers the 'query-filters' service in the application container as a singleton.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/query-filters.php', 'query-filters');

        $this->app->singleton('query-filters', function () {
            return new QueryFilters();
        });
    }

    /**
     * Registers a global query scope "applyFilters" on the Builder class.
     *
     * The "applyFilters" query scope applies the given $queryFilters to the current query builder instance.
     * It allows chaining of query filters and returns the modified query builder instance.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/query-filters.php' => config_path('query-filters.php'),
            ], 'config');
        }

        $this->registerMacro();
    }

    /**
     * Registers a macro for applying query filters.
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    protected function registerMacro(): void
    {
        $methodName = config('query-filters.method_name', 'applyFilters');
        $macro = function ($queryFilters) {
            $queryFilters->apply($this);
            return $this;
        };
        /** @var string $methodName */
        EloquentBuilder::macro($methodName, $macro);
        BaseBuilder::macro($methodName, $macro);
    }
}
