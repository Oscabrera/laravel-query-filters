# QueryFilters Class

The QueryFilters class in the `Oscabrera\QueryFilters\Utilities` namespace provides a way to specify query options
for performing database queries in Laravel. This class allows you to define the filtering conditions for your queries.

## Properties

- **conditions** (array<string|int, string|bool|int|float|array<int|string, int|string|bool|float|Closure>>): Stores an
  associative array that defines the filtering conditions for the query. The key of the array represents the column name
  and the value represents the value(s) to be compared. Conditions can also be arrays specifying the operator to use.