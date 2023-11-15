<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        if($post->isLikedBy(auth()->user())) {
            Reaction::where('tweet_id', $post->id)->where('user_id', auth()->user()->id)->delete();
        }else {
            $post->like(auth()->user());
        }
        return back();
    }
}
