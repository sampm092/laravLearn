<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

    public function login()
    {
        return view('login');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect('login')->with('success','Logout success');
    }

    public function regist()
    {
        return view('regist');
    }

    public function registore(Request $request)
    {
        $this->validate($request, [
            'picture' => 'image|mimes:png,jpg,jpeg',
            'username' => 'required|min:5|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        // upload image
        $image = $request->file('picture');
        $default = $image ? $image->hashName() : 'default.png';
        if ($image) {
            $image->storeAs('public/profile', $image->hashName()); //randomize nama file
        }
        $user = new User([
            'picture' => $default,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->save();

        if ($user) {
            # pesan sukses
            return redirect()->route('login')->with(['success' => 'Profile added successfully']);
        } else {
            return redirect()->route('regist')->with(['error' => 'Process failed']);
        }
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'username' => 'required|min:5|max:30',
                'password' => 'required' 
            ]
        );

        if (auth()->attempt($validated)) { //auth() harus untuk password yg sudah di-hash
            request()->session()->regenerate();
            return redirect()->route('bookView')->with('success', 'success');
        }
        return redirect()->route('login')->withErrors([
            'username' => "Wrong username",
            'password' => "Wrong password"
        ]);

    }
}