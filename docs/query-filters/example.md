# Usage Example

```php
$conditions = [
            'rate' => [
                'subQuery' => function ($query) use (array $excluded) {
                    $subQuery = $query->from('reviews as a')->selectRaw('min(a.rate)')->where('a.active', true);
                    if($excluded) {
                        $subQuery->whereNotIn('a.name', $excluded);
                    }
                    return $subQuery;
                },
                'not' => false,
            ],
            ['name', '<>', $excluded],
            'active' => true
        ];

$queryFilters = new QueryFilters($conditions);
$users = User::query()->applyFilters($query)->get();
```

This example defines a `$conditions` array with various filtering conditions. Then, an instance of the `QueryFilters`
class
is created and applied to the query builder object using the `apply` method. Finally, the query is executed to
retrieve the users that meet the specified conditions.

## Simple Conditions.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $conditions = ['status' => 'active'];
    $queryFilters = new QueryFilters($conditions);
    $results = YourModel::query()->applyFilters($queryFilters)->get();

    return response()->json($results);
}
```
## Array Conditions.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $conditions = ['status' => ['active', 'pending']];
    $queryFilters = new QueryFilters($conditions);
    $results = YourModel::query()->applyFilters($queryFilters)->get();

    return response()->json($results);
}
```

## Triple Conditions Simple.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $queryFilters = new QueryFilters([['age', '>', 18]]);
    $results = YourModel::query()->applyFilters($queryFilters)->get();

    return response()->json($results);
}
```

## Triple Conditions Matrix.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $queryFilters = new QueryFilters([['age', '=', [18, 19, 20]]]);
    $results = YourModel::query()->applyFilters($queryFilters)->get();

    return response()->json($results);
}
```

## SubQueries.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $conditions = [
        'user_id' => [
            'subQuery' => function($query) {
                $query->select('id')->from('users')->where('active', 1);
            }
        ]
    ];
    $queryFilters = new QueryFilters($conditions);
    $results = YourModel::query()->applyFilters($queryFilters)->get();

    return response()->json($results);
}
```

## Negative SubQueries.

```php
use Oscabrera\QueryFilters\Utilities\QueryFilters;
use App\Models\YourModel;
use Illuminate\Http\Request;

public function index(Request $request)
{
    $conditions = [
        'user_id' => [
            'subQuery' => function($query) {
                $query->select('id')->from('users')->where('active', 0);
            },
            'not' => true
        ]
    ];
    $queryFilters = new QueryFilters($conditions);
    
    $results = YourModel::query()
                        ->applyFilters($queryFilters)
                        ->get();
    
    return response()->json($results);
}
```