<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getChoices($questions_id){
        $question_list = Question::find($questions_id)->choices()->get();
        return response()->json($question_list, 200);
    }
}
