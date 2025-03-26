<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as Req;
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
        // $token = 'e5254be37cb9300a031e97303ae320f3ded941116e74f92d4f9794448bc8a5d1';
        // $response = Http::withToken($token)
        //             ->get('https://simple-books-api.glitch.me/books');
        
        if ($response->successful()) {
 
            return $response->json();
    }
        return response()->json(['error' => 'Failed to fetch data'], $response->status());

    }

    public function showCustomers()
    {
        $customers = $this->getCustomers();
        // dd($customers);
        return view('index', compact('customers'));
    }
    public function showLists()
    {
        $customers = $this->getCustomers();
        // dd($customers);
        return view('list', compact('customers'));
    }

    public function storePage(){
        return view('store');
    }

    public function store(Req $request)
    {
        $request->validate([
            'cover'       => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'genre'       => 'required|in:F,NF', // Must be either 'F' or 'NF'
            'description' => 'nullable|string',
        ]);
        
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://127.0.0.1:8000/api/books', [
            'title'       => $request->title,
            'author'      => $request->author,
            'genre'       => $request->genre,
            'description' => $request->description,
        ]);
        
        $response = Http::post('http://127.0.0.1:8000/api/books', [
            'cover'       => $request->cover,
            'title'       => $request->title,
            'author'      => $request->author,
            'genre'       => $request->genre,
            'description' => $request->description,
        ]);

         // Check if the request was successful
         if ($response->successful()) {
            return back()->with('success', 'Book added successfully!');
        } else {
            return back()->with('error', 'Failed to add book.');
        }
    }


}
