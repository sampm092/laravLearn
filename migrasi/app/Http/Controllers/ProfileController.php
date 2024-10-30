<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        //get all posts from Model
        $users = User::latest()->get();

        //passing posts to view
        return view('profile', compact('users'));
    }
}
