<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class CustomersFilter extends ApiFilter
{
  protected $allowedParams = [
    'name' => ['eq'],
    'type' => ['eq'],
    'email' => ['eq'],
    'address' => ['eq'],
    'state' => ['eq'],
    'city' => ['eq'],
    'postalCode' => ['eq', 'gt', 'lt']
  ];
  protected $columnMap = ['postalCode' => 'postal_code'];
  protected $operatorMap = [
    'eq' => '=',
    'gt' => '>',
    'lt' => '<',
    'gte' => '>=',
    'lte' => '<=',
  ];
}
