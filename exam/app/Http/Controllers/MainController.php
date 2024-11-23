<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainIndex(){
        $question = Question::orderBy('id', 'ASC')->paginate(10);
        $option = Question::with('options');
        // dump($option);
        return view('welcome', compact('question', 'option'));
        
    }
}
