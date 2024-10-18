<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('welcome');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

    public function login() {
        return view('login');
    } //Function index yg ada pada kelas indexCOntroller yang mengembalikan file welcome.blade.php yang ada di resources/views

}
