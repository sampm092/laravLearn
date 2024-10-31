<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $userID = auth()->id();
        $user = User::findOrFail($userID);
        $books = Book::latest()->get();;
        dump($userID);

        if (request()->has('search')) {
            $books = $books->where('title', 'LIKE', '%' . request()->get('search', '') . '%')
                ->orWhere('author', 'LIKE', '%' . request()->get('search', '') . '%');
        }
        return view('profile', [
            'user' => $user,
            'books' => $books

        ]);
    }

    public function bookView()
    {
        $userID = auth()->id();
        $user = User::findOrFail($userID);
        $books = Book::latest()->get();

        if (request()->has('search')) {
            $books = $books->where('title', 'LIKE', '%' . request()->get('search', '') . '%')
                ->orWhere('author', 'LIKE', '%' . request()->get('search', '') . '%');
        }
        return view('dashboard', [
            'user' => $user,
            'books' => $books
        ]);
    }

    public function createV()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cover' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'author' => 'required|max:200',
            'desc' => 'required'
        ]);
        // upload image
        $userID = auth()->id();
        $image = $request->file('cover');
        $image->storeAs('public/books', $image->hashName()); //randomize nama file

        $book = new Book([
            'cover' => $image->hashName(),
            'title' => $request->title,
            'author' => $request->author,
            'desc' => $request->desc,
            'user_id' => $userID    
        ]);
        $book->save();

        if ($book) {
            # pesan sukses
            return redirect()->route('profile')->with(['success' => 'Book added successfully']);
        } else {
            return redirect()->route('profile')->with(['error' => 'Process failed']);
        }
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        Storage::disk('local')->delete('public/books/' . $book->cover);
        $book->delete();

        if ($book) {
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Book deleted successfully !']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Book can not be deleted']);
        }

    }

    public function edit(Book $book)
    {

        return view('edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {

        $book = Book::findOrFail($book->id);
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required |max:200',
            'desc' => 'required'
        ]);

        if ($request->file('cover') == "") {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'content' => $request->content
            ]);
        } else if (File::exists($request->file('cover'))) {
            //hapus image lama
            Storage::disk('local')->delete('public/books/' . $book->cover);
            //upload new image
            $image = $request->file('cover');
            $image->storeAs('public/books', $image->hashName());

            $book->update([
                'cover' => $image->hashName(),
                'title' => $request->title,
                'author' => $request->author,
                'content' => $request->content
            ]);

        } else {
            echo 'gagal';
        }


        if ($book) {
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Book updated successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Update failed']);
        }
    }

    public function detailed(Book $book)
    {
        $book = Book::findOrFail($book->id);
        $books = Book::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $books = $books->where('title', 'LIKE', '%' . request()->get('search', '') . '%')
                ->orWhere('author', 'LIKE', '%' . request()->get('search', '') . '%');
        }
        
        return view('detailed', [
            'books' => $book
        ]);
    }
}
