<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('welcome');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

    public function login() {
        return view('login');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

    public function registore(Request $request) {
        $this->validate($request, [
            'picture' => 'image|mimes:png,jpg,jpeg',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        // upload image
        $image = $request->file('picture');
        $image->storeAs('public/profile', $image->hashName()); //randomize nama file

        $user = new User([
            'picture' => $image->hashName(),
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->save();

        if ($user) {
            # pesan sukses
            return redirect()->route('login')->with(['success' => 'Profile added successfully']);
        } else {
            return redirect()->route('login')->with(['error' => 'Process failed']);
        }
    }
}
