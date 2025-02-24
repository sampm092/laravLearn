<?php

namespace App\Services\V1;

use Illuminate\Http\Request;

//Handling User Input

class CustomerQuery
{
    //allowed parameters for filter
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq','gt','lt'],
    ];

    //Maps API parameter names to actual database column names.
    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMaps = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
    ];

        public function transform(Request $request){
            $eloQuery = [];  // Initialize an empty array to store query conditions

            foreach ($this->safeParams as $parm => $operators) {
                $query = $request->query($parm);

                if(!isset($query)){ //isset = cek ada atau tidak (isset = true, !isset = false)
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
