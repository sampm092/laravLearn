<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as Req;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function getCustomers()
{
    // ✅ Step 1: Fetch data from API
    $response = Http::get('http://127.0.0.1:8000/api/books');

    // ✅ Step 2: Convert API response to array
    $data = $response->json();

    // ✅ Step 3: Ensure 'data' key exists
    $books = collect($data['data'] ?? []);

    if ($books->isEmpty()) {
        dd("No data found! Check API response.", $data);
    }

    // ✅ Step 4: Manually paginate
    $perPage = 5;
    $currentPage = request()->input('page', 1);
    $offset = ($currentPage - 1) * $perPage;

    $paginatedBooks = new LengthAwarePaginator(
        $books->slice($offset, $perPage)->values(),
        $books->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url()]
    );

    // ✅ Step 5: Manually add links (like Laravel)
    $paginatedBooks->appends(request()->query()); // Keep query parameters

    return $paginatedBooks;
}

public function showCustomers()
{
    $customers = $this->getCustomers();

    return view('index', compact('customers'));
}

    public function showLists()
    {
        $customers = $this->getCustomers();
        // dd($customers);
        return view('list', compact('customers'));
    }

    public function storePage()
    {
        return view('store');
    }

    public function store(Req $request)
    {
        $request->validate([
            'cover' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|in:F,NF', // Must be either 'F' or 'NF'
            'description' => 'nullable|string',
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://127.0.0.1:8000/api/books', [
                    'title' => $request->title,
                    'author' => $request->author,
                    'genre' => $request->genre,
                    'description' => $request->description,
                ]);

        $response = Http::post('http://127.0.0.1:8000/api/books', [
            'cover' => $request->cover,
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
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
