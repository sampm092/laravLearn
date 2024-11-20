<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        return view('admin.questionlist');
    }

    public function addView()
    {
        return view('admin.createQ');
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'question_text' => $request->questionText,
        ]);

        $options = [
            $request->option1,
            $request->option2,
            $request->option3,
            $request->option4,
            $request->option5,
        ];

        foreach ($options as $optionText) {
            Option::create([
                'question_id' => $question->id,
                'option_text' => $optionText,
            ]);
        }

        return view('admin.questionlist', compact('question', 'options'));
    }
}
