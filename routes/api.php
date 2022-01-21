<?php


use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/', ['QuizController@index']);
Route::get('/', [QuizController::class, 'get_quizzes_published']);
Route::get('/admin', [QuizController::class, 'get_all_quizzes']);
Route::get('/scores', [ScoreController::class, 'get_scores']);
Route::post('/new-quiz', [QuizController::class, 'new_quiz']);
Route::put('/edit-quiz/{id}', [QuizController::class, 'edit_quiz']);
Route::post('/take-quiz/{id}', [QuizController::class, 'take_quiz']);


Route::apiResource('/choices', ChoiceController::class);
Route::apiResource('/questions', QuestionController::class);
Route::apiResource('/quizzes', QuizController::class);
Route::apiResource('/scores', ScoreController::class);


// Route::apiResource('quiz', 'QuizController');

// Route::apiResource('question', 'QuestionController');
// Route::apiResource('choice', 'ChoiceController');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

