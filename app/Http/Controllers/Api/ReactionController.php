<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reaction;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $isLiked = false;
        if($post->isLikedBy(auth()->user())) {
            Reaction::where('post_id', $post->id)->where('user_id', auth()->user()->id)->delete();
            $isLiked = false;
        }else {
            $post->like(auth()->user());
            $isLiked = true;
        }
        return response()->json(['liked' => $isLiked]);
    }
}
