<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Models\Question;
use App\Models\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{

    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }
   
    public function store(Question $question,Request $request)
    {
        $reply = $question->replies()->create($request->all());
        return response()->json(['reply' => new ReplyResource($reply)], Response::HTTP_CREATED);
    }

    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    public function update(Question $question, Request $request, Reply $reply)
    {
        $reply->update($request->all());

        return response()->json('Updated', Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question,Reply $reply)
    {
        $reply->delete();

        return response()->json('Deleted', Response::HTTP_NO_CONTENT);
    }
}
