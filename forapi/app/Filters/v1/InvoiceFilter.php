<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

//Handling User Input

class InvoiceFilter extends ApiFilter
{ 
    //allowed parameters for filter
    protected $safeParams = [
        'customer_id' => ['eq'],
        'amount' => ['eq','lt','gt'],
        'status' => ['eq','ne'],
        'billed_date' => ['eq','lt','gt'],
        'paid_date' => ['eq','lt','gt'],
    ];

    //Maps API parameter names to actual database column names.
    protected $columnMap = [
        'paidDate' => 'paid_date',
        'billedDate' => 'billed_date'
    ];

    protected $operatorMaps = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'ne' => '!='
    ];

}
