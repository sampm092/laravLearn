<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $books = Book::latest()->paginate(10);
        return view('profile', compact('books'));
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
            'author' => 'required',
            'desc' => 'required'
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
        } else {
            return redirect()->route('profile')->with(['error' => 'Data gagal bang']);
        }
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        Storage::disk('local')->delete('public/books/' . $book->cover);
        $book->delete();

        if ($book) {
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Data Gagal Dihapus!']);
        }

    }

    public function edit(Book $book)
    {
        dump(Book::all());
        return view('edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {

        $book = Book::findOrFail($book->id);

        if ($request->file('cover') == "") {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'content' => $request->content
            ]);
        } else {
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

        }

        if ($book) {
            //redirect dengan pesan sukses
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('profile')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
