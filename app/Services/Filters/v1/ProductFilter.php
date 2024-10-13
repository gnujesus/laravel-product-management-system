<?php

namespace App\Services\Filters\v1;

use Illuminate\Http\Request;
use App\Services\Filters\BaseFilter;

class ProductFilter extends BaseFilter
{
  public function __construct(array $safeParams = [], array $columnMap = ['ownerId' => 'owner_id', 'storageId' => 'storage_id'])
  {
    parent::__construct($safeParams, $columnMap);
  }

}
