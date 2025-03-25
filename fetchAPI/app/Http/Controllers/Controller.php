<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function getCustomers()
    {
        $response = Http::get('http://127.0.0.1:8000/api/books');
        
        if ($response->successful()) {
            // dd($response->json());
            return $response->json(); // Convert response to JSON array
        }
        // return response()->json(['error' => 'Failed to fetch data'], $response->status());

    }
    public function showCustomers()
    {
        $customers = $this->getCustomers();
        return view('index', compact('customers'));
    }


}
