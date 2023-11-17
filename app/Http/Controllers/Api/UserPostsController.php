<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, ApiResponseService $apiResponseService)
    {
         $data = $user->posts()->withReactions()->get();
         return $apiResponseService->efflux($data);
    }
}
