<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class ProfileController extends Controller
{
    public function index()
    {
        //get all posts from Model
        $users = User::latest()->get();

        //passing posts to view
        return view('profile', compact('users'));
    }


    public function detailed(User $user)
    {
        // $book = Book::findOrFail($book->id);
        // $books = Book::orderBy('created_at', 'DESC');

        
        // return view('detailed', [
        //     'books' => $book
        // ]);

        $user = User::findOrFail($user->id);
        $users = User::latest()->get();

       
        return view('detailed', [
            'users' => $users,
            'user' => $user
        ]);
    }
}
