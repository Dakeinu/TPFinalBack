<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;

class ScoreController extends Controller
{
    public function getScores(){
        return Score::all();
    }

}
