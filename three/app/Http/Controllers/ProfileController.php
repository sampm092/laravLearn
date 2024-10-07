<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile() {
        return view('profile', [
            'books' => Book::all()
        ]);
    }

    public function createV(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'cover'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'author'   => 'required',
            'desc'   => 'required'
        ]);
        // upload image
        $image = $request->file('cover');
        $image->storeAs('public/books', $image->hashName()); //randomize nama file

        $book = new Book([
            'cover' => $image->hashName(),
            'title' => $request->title,
            'author' => $request->author,
            'desc' => $request->desc
        ]);
        $book->save();

        if ($book) {
            # pesan sukses
            return redirect()->route('profile')->with(['success' => 'Data aman bang']);
        } else{
            return redirect()->route('profile')->with(['error' => 'Data gagal bang']);
        }
    }
    
}
