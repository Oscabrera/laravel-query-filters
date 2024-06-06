# Usage

## Installation

### Composer Dependency:

To leverage the functionalities offered by the `oscabrera/laravel-query-filters` package in your Laravel project, you'll
need to install it using Composer, the dependency management tool for PHP. Open your terminal or command prompt and
navigate to your project's root directory. Then, execute the following command:

```shell
composer require oscabrera/laravel-query-filters
```

### Publish the Configuration File:

The configuration file is optional, but provides additional flexibility by allowing you to change the name of the method
used to apply the filters. To publish the configuration file, run the following command:

```shell
php artisan vendor:publish --provider="Oscabrera\QueryFilters\QueryFiltersServiceProvider" --tag="config"
```

This command will create a `config/query-filters.php` file in your Laravel application. You can edit this file to adjust
the package settings.

### Configuration File Example

The published configuration file `config/query-filters.php` will have the following content by default:

```php
return [
    /*
     * The name of the macro that is added to the Eloquent query builder.
     */
    'method_name' => 'applyFilters',
];
```

### Purpose of Configuration File

The configuration file allows you to change the name of the method that is used to apply filters in **Eloquent**
queries. By default, the method is called `applyFilters`, however, you can change this name depending on your
preferences or project needs.