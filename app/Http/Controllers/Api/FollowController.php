<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, ApiResponseService $apiResponseService)
    {
        $message = auth()->user()->following($user) ? 'Unfollowed' : 'Following';
        auth()->user()->toggleFollow($user);
        return $apiResponseService->efflux($message);
    }
}
