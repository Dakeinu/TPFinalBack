<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{

    public function index()
    {
        return Choice::all();
    }

    public function store(Request $request)
    {
        $choice = Choice::create($request->all());
        return response()->json($choice, 201);
    }

    public function show(Choice $id)
    {
        return Choice::find($id)
    }

    public function update(Request $request, Choice $id)
    {
        $choice = Choice::findOrFail($id);
        $choice->update($request->all());
        return response()->json($choice, 200);    }

    public function destroy(Choice $id)
    {
        Choice::findOrFail($id)->delete();
        return response(['message' => 'Deleted Successfully'], 200);
    }

    public function get_choice(Question $question_id)
    {
        $choice = Choice::where('question_id', $question_id)->get();
        return response(200);
    }
}
