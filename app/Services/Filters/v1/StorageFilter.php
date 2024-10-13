<?php

namespace App\Services\Filters\v1;

use Illuminate\Http\Request;
use App\Services\Filters\BaseFilter;

class StorageFilter extends BaseFilter
{

  public function __construct(array $safeParams = [], array $columnMap = ['ownerId' => 'owner_id'])
  {
    parent::__construct($safeParams, $columnMap);
  }
}
