<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $question = Question::orderBy('id', 'ASC')->paginate(10);
        $option = Question::with('options');
        // dump($option);
        return view('admin.questionlist', compact('question', 'option'));
    }

    public function addView()
    {
        return view('admin.createQ');
    }

    public function editView(Question $question)
    {
        $option = Question::with('options');
        return view('admin.editQ', compact('question', 'option'));
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'question_text' => $request->question_text,
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

        return redirect()->route('index', compact('question', 'options'));
    }

    public function update(Request $request, Question $question)
    {

        $question = Question::findOrFail($question->id);

        $question->update([
            'question_text' => $request->question_text,
        ]);

        // $options = [
        //     $request->option1,
        //     $request->option2,
        //     $request->option3,
        //     $request->option4,
        //     $request->option5,
        // ];

        // dump($request);

        if ($question) {
            //redirect dengan pesan sukses
            return view('admin.check')->with(['success' => 'Book updated successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('index')->with(['error' => 'Update failed']);
        }
    }
    public function destroyQ($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        if ($question) {
            //redirect dengan pesan sukses
            return redirect()->route('index')->with(['success' => 'Book deleted successfully !']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('index')->with(['error' => 'Book can not be deleted']);
        }

    }
    public function trueAnswer(Option $option)
    {
        $option = Option::findOrFail($option->id);
        if ($option->is_correct === 0) {
            $option->update([
                'is_correct' => 1
            ]);
        } else {
            $option->update([
                'is_correct' => 0
            ]);
        }


        if ($option) {
            //redirect dengan pesan sukses
            return redirect()->route('index')->with(['success' => 'User role changed successfully!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('index')->with(['error' => 'Update failed']);
        }
    }
}



