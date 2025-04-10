<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

//Handling User Input

class BookFilter extends ApiFilter
{
    //allowed parameters for filter
    protected $safeParams = [
        'title' => ['eq'],
        'author' => ['eq'],
        'genre' => ['eq'],
    ];

    //Maps API parameter names to actual database column names.
    protected $operatorMaps = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];  // Initialize an empty array to store query conditions

        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) { //isset = cek ada atau tidak (isset = true, !isset = false)
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMaps[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
