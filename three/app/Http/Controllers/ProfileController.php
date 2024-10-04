<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        // $book = new Book([
        //     'cover' => 'one',
        //     'title' => ' testing',
        //     'author' => 'sam',
        //     'desc' => 'something'
        // ]);
        // $book->save();
        return view('profile', [
            'books' => Book::all()
        ]);
    }
}
