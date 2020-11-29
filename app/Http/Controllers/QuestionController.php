<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
   
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

  

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
       Question::create($data);

       return response()->json('Created', Response::HTTP_CREATED);

    }

    
    public function show(Question $question)
    {
        return new QuestionResource($question); 
    }

    
    public function update(Request $request, Question $question)
    {
        $data = $request->all();
       $question->update($data);
       return response()->json('Updated', Response::HTTP_ACCEPTED); 
    }

    
    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json('Deleted',Response::HTTP_NO_CONTENT);
    }
}
