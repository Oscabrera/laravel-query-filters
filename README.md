# Laravel Query Filters

A Laravel package for advanced query filtering and conditions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oscabrera/laravel-query-filters.svg?style=flat-square)](https://packagist.org/packages/oscabrera/laravel-query-filtersgsgs)
[![Total Downloads](https://img.shields.io/packagist/dt/oscabrera/laravel-query-filters.svg?style=flat-square)](https://packagist.org/packages/oscabrera/laravel-query-filtersgsgs)

[![VitePress](https://github.com/oscabrera/laravel-query-filters/actions/workflows/deploy.yml/badge.svg)](https://github.com/oscabrera/laravel-query-filters/actions/workflows/deploy.yml)
[![PHPStan](https://github.com/oscabrera/laravel-query-filters/actions/workflows/phpstan.yml/badge.svg?branch=develop)](https://github.com/oscabrera/laravel-query-filters/actions/workflows/phpstan.yml?query=branch%3Adevelop)
[![Pint](https://github.com/oscabrera/laravel-query-filters/actions/workflows/pint.yml/badge.svg?branch=develop)](https://github.com/oscabrera/laravel-query-filters/actions/workflows/pint.yml?query=branch%3Adevelop)
[![PHPMD](https://github.com/oscabrera/laravel-query-filters/actions/workflows/phpmd.yml/badge.svg?branch=develop)](https://github.com/oscabrera/laravel-query-filters/actions/workflows/phpmd.yml?query=branch%3Adevelop)

[![built with Codeium](https://codeium.com/badges/main)](https://codeium.com)

![laravel-query-filters](https://socialify.git.ci/Oscabrera/laravel-query-filters/image?language=1&name=1&owner=1&pattern=Floating%20Cogs&theme=Auto)

## Installation

Install the package via Composer:

```shell
composer require oscabrera/laravel-query-filters
```

## Configuration (Optional)

You can publish the configuration file to customize the method name used for applying filters. This is optional, but it
provides additional flexibility.

Publish the configuration file:

```shell
php artisan vendor:publish --provider="Oscabrera\QueryFilters\QueryFiltersServiceProvider" --tag="config"
```

This will create a `config/query-filters.php` file in your Laravel application. You can modify this file to change the
method name:

```php
return [
    /*
     * The name of the macro that is added to the Eloquent query builder.
     */
    'method_name' => 'applyFilters',
];
```

## Usage

Here's an example of how to use the QueryFilters in a controller:

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\User;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $conditions = [
        'name' => 'John',
        'age' => ['age', '>', 25],
        'status' => ['active', 'pending'],
        'role' => [
            'subQuery' => function($query) {
                return $query->select('id') ->from('roles') ->where('name', 'admin');
            },
            'not' => false,
        ]
    ];
    $queryFilters = new QueryFilters($conditions);
    $users = User::query()->applyFilters($queryFilters)->get();

    return response()->json($users);
}
```

## Features

- **Simple Conditions**: Apply simple equality conditions.
- **Array Conditions**: Use whereIn conditions for columns.
- **Triple Conditions**: Apply conditions with specific operators.
- **SubQueries**: Use subqueries for complex filtering.
- **Customizable Method Name**: Change the method name for applying filters via configuration.

## More Information

For more information, visit the [documentation](https://oscabrera.github.io/laravel-query-filters).

By following these instructions, you can easily integrate advanced query filtering into your Laravel applications,
customize the filtering method name, and keep your code clean and maintainable.