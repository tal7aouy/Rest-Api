<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter
{
  protected $allowedParams = [
    'invoice_id' => ['eq'],
    'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    'customerId' => ['eq'],
    'status' => ['eq', 'ne'],
    'billedDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    'paidDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
  ];
  protected $columnMap = [
    'billedDate' => 'pilled_date',
    'paidDate' => 'paid_date',
    'customerId' => 'customer_id',
  ];
  protected $operatorMap = [
    'eq' => '=',
    'gt' => '>',
    'lt' => '<',
    'gte' => '>=',
    'lte' => '<=',
    'ne' => '!='
  ];
}
