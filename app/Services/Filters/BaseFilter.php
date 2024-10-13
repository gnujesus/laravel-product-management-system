<?php


namespace App\Services\Filters;

use Illuminate\Http\Request;

class BaseFilter
{

  protected $safeParams;

  protected $columnMap;

  protected $operatorsMap = [
    'gt' => '>',
    'goq' => '>=',
    'loq' => '<=',
    'lt' => '<',
    'eq' => '=',
    'nq' => '!='
  ];

  public function __construct(array $safeParams, array $columnMap)
  {
    $this->safeParams = $safeParams;
    $this->columnMap = $columnMap;
  }

  public function transform(Request $request)
  {
    $eloquentQuery = [];

    // O(n^2)
    foreach ($this->safeParams as $param => $operators) {
      // so here it search for the query for a specific param
      // ex, if it's name, it'll find things like 'eq' => eduardo
      // if it's price, then ['gt' => 10, 'lt' => 12]
      $query = $request->query($param);

      if (!isset($query)) {
        continue;
        // next iteration if the query is not set
      }

      $column = $param;

      foreach ($operators as $operator) {
        if (isset($query[$operator])) {
          // add to the array
          // so when it says $query[$operator] it's searching for the value assigned
          // to that specific operator for the current parameter
          $eloquentQuery[] = [$column, $this->operatorsMap[$operator], $query[$operator]];
        }
      }

      return $eloquentQuery;

    }
  }


}