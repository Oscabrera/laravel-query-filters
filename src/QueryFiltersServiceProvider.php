<?php

use Illuminate\Support\ServiceProvider;
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use Illuminate\Database\Eloquent\Builder;

class QueryFiltersServiceProvider extends ServiceProvider
{
    /**
     * Registers the 'query-filters' service in the application container as a singleton.
     *
     * @return void
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
     *
     */
    public function boot(): void
    {
        $methodName = config('query-filters.method_name', 'applyFilters');
        /** @var string $methodName */
        $builder = app(Builder::class);
        $builder::macro($methodName, function ($queryFilters) {
            $queryFilters->apply($this);
            return $this;
        });

        $this->publishes([
            __DIR__ . '/../config/query-filters.php' => config_path('query-filters.php'),
        ], 'config');
    }
}
