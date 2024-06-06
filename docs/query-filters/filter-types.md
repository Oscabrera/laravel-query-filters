# Filter Types

There are six types of filtering.

## List of Filter Types

- Simple Conditions.
- Array Conditions.
- Triple Conditions Simple.
- Triple Conditions Matrix.
- SubQueries.
- Negative SubQueries.

## Filters Description

### Simple Conditions

**Description**: Applies a simple equality condition to a column.

**Example**: 
```php
['status' => 'active']
``` 
- This will filter out records where the status column equals 'active'.

### Matrix Conditions

**Description**: Applies a **WHERE IN** condition to a column, checking if the column value is within a list of values.

**Example**:
```php
['status' => ['active', 'pending']]
```
- This will filter out records where the status column is `'active'` or `'pending'`.

### Triple Conditions Simple

**Description**: Applies a condition with a specific operator to a column.

**Example**: 
```php
[['age', '>', 18]]
```
- This will filter out records where the age column is greater than `18`.

> The logic of the triple conditions in the QueryFilters class closely follows the where clause approach in Laravel, as
  described in the official Laravel documentation. Just like in Laravel where clauses, where you can specify the column,
  operator and value for the conditions. more info [here](https://laravel.com/docs/11.x/queries#where-clauses).

### Triple Conditions Matrix

**Description**: Applies a condition with a specific operator to a column using **WHERE IN** or **WHERE NOT IN**.

**Example**:
```php
[['age', '=', [18, 19, 20]]]
```
- This will filter out records where the age column is equal to `18`, `19`, or `20`.

### SubQueries

**Description**: Applies a **WHERE IN** condition using a **subquery**.

**Example**:
```php
[
    'user_id' => [
        'subQuery' => function($query) {
            return $query->select('id')->from('users')->where('active', 1);
        },
        'not' => false,
    ]
]
```
- This will filter out records where the `user_id` column is in the list of active user IDs.
> the parameter `not` is optional and defaults to `false`.

### Negative SubQueries

**Description**: Applies a **WHERE NOT IN** condition using a **subquery**.

**Example**:
```php
[
    'user_id' => [
        'subQuery' => function($query) {
            return $query->select('id')->from('users')->where('active', 0);
        },
        'not' => true,
    ]
]
```

- This will filter out records where the `user_id` column is not in the list of inactive user IDs.
Simple Examples of Use