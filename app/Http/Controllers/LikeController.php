<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
   public function likeIt(Reply $reply)
   {
        $reply->likes()->create([
            'user_id' => 1,
        ]);
        return response()->json('liked', Response::HTTP_CREATED);
   }

   public function unLikeIt(Reply $reply)
   {
        $reply->likes()->where('user_id', '1')->first()->delete();
        return response()->json('unliked', Response::HTTP_NO_CONTENT);
   }
}
