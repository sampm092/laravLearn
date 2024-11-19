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
        $user = User::with('books')->findOrFail($userID);
        // $profile = User::latest();

        $booksQuery = $user->books()->orderBy('created_at', 'DESC');
        // dump($user);

        // Apply search filters if the request has a 'search' parameter
        if (request()->has('search')) {
            $search = request()->get('search');
            $booksQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('author', 'LIKE', '%' . $search . '%');
            });
        }

        // Paginate after applying the search filters
        $books = $booksQuery->paginate(10);
        // $bookURL = Storage::url('public/books/' . $books->cover);

        $profileImageUrl = Storage::url('public/profile/' . $user->picture);

        return view('profile', compact('user', 'books', 'profileImageUrl'));
        // SEARCH FOR NO PAGINATION 
        // $books = $user->books()->orderBy('created_at', 'DESC')->paginate(10);

        // if (request()->has('search')) {
        //     $books = $books->where('title', 'LIKE', '%' . request()->get('search', '') . '%')
        //         ->orWhere('author', 'LIKE', '%' . request()->get('search', '') . '%');
        // }
        // return view('profile', compact('user', 'books'));
    }

    public function bookView()
    {
        $userID = auth()->id();
        $user = User::findOrFail($userID);

        // Start building the books query with search filters
        $booksQuery = $user->books()->orderBy('created_at', 'DESC');

        // Apply search filters if the request has a 'search' parameter
        if (request()->has('search')) {
            $search = request()->get('search');
            $booksQuery->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('author', 'LIKE', '%' . $search . '%');
            });
        }

        // Paginate after applying the search filters
        $books = $booksQuery->paginate(8);

        return view('dashboard', compact('user', 'books'));
    }

    public function createV()
    {
        return view('create');
    }

    public function about()
    {
        return view('about');
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

    public function updateProfile(Request $request)
    {
        $userID = auth()->id();
        $user = User::findOrFail($userID);

        if ($request->hasFile('picture')) {
            // Delete the old picture if it exists
            if ($user->picture && Storage::disk('local')->exists('public/profile/' . $user->picture)) {
                Storage::disk('local')->delete('public/profile/' . $user->picture);
            }
        
            // Upload new picture
            $image = $request->file('picture');
            $image->storeAs('public/profile', $image->hashName());
        
            // Update the picture
            $user->update(['picture' => $image->hashName()]);
        }
        
        // Update the username if provided
        if (!empty($request->username)) {
            $user->update(['username' => $request->username]);
        }


        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Book updated successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Update failed']);
        }
    }

    public function destroyProfile()
    {
        $userID = auth()->id();
        $user = User::findOrFail($userID);
        Storage::disk('local')->delete('public/profile/' . $user->cover);
        $user->delete();

        if ($user) {
            //redirect dengan pesan sukses
            return redirect()->route('welcome')->with(['success' => 'Account deleted successfully !']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('welcome')->with(['error' => 'Account can not be deleted']);
        }

    }

    public function detailed(Book $book)
    {
        $book = Book::findOrFail($book->id);

        return view('detailed', [
            'books' => $book
        ]);
    }
}
