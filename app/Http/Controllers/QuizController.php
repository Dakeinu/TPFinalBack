<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Score;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function getQuizzes(){
        return Quiz::all();
    }

    public function getQuiz($quizId){
        return Quiz::find($quizId);
    }

    public function getQuestions($quizId){
        $all_questions = Quiz::find($quizId)->questions()->get();
        return response()->json($all_questions, 200);
    }

    public function addQuiz(Request $request){
       
        $requestContent = json_decode($request->getContent());

        $quiz = new Quiz();
        $quiz['label'] = $requestContent->label;
        $quiz['published'] = false;
        $quiz-> save();
        
        foreach($requestContent->questions as $q){
            $question = new Question();
            $question['quiz_id'] = $quiz->id;
            $question['label'] = $q->label;
            $question['earnings'] = $q->earnings;
            $question['answer'] = null;
            $temp_answer = $q->answer;
            $question->save();

            foreach($q->choices as $choice){
                $answer = new Choice;
                $answer['question_id'] = $question->id;
                $answer['label'] = $choice->label;
                $answer->save();
                if($choice->id == $temp_answer){
                    $question["answer"] = $answer['id'];
                    $question->save();
                }
            }
            
            $question->save();
        }

        return response()->json("Quiz Créé !", 200);
    }

    public function publish($quizId){
         $quiz = Quiz::find($quizId);
         $quiz -> update(['published'=>1]);
         return response(200);
    }

    public function unpublish($quizId){
         $quiz = Quiz::find($quizId);
         $quiz -> update(['published'=>0]);
         return response(200);
    }

    public function editQuiz(Request $request, $quizId){
        $requestContent = json_decode($request->getContent());

        $quiz = Quiz::find($quizId);
        $questions = Question::where("quiz_id", $quizId)->get();
        foreach($questions as $question){
            Choice::where("question_id", $question['id'])->delete();
        }
        Question::where("quiz_id", $quiz['id'])->delete();
        Score::where("quiz_id", $quiz['id'])->delete();
        Quiz::find($quiz['id'])->delete();

        return $this->addQuiz($request);
   }

    public function removeQuiz($quizId){
        $quiz = Quiz::find($quizId);
        $quiz->delete();
        return response()->json("Quiz Supprimé !", 200);
    }
    
    public function submitQuiz(Request $request) {
        $requestContent = json_decode($request->getContent());
        $user = auth()->user();

        $quiz_id = $requestContent->quiz_id;
        $answers = $requestContent->answers;
        $quiz = Quiz::find($quiz_id);
        $existingScores = Score::where("user_id", $user["id"])->where("quiz_id", $quiz_id)->get();
        if ($existingScores != null && count($existingScores) > 0) {
            return response()->json("Quiz déjà effectué !", 400);
        }

        $finalScore = 0;

        foreach ($answers as $answer) {
            $question = Question::find($answer->question_id);
            if ($question->answer == $answer->answer) {
                $finalScore += $question->earnings;
            }
        }

        $score = new Score();
        $score["user_id"] = $user["id"];
        $score["quiz_id"] = $quiz_id;
        $score["score"] = $finalScore;
        $score->save();

        return response("ok");
    }
}
