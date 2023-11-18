<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, ApiResponseService $apiResponseService)
    {
        if($user){
            $data = new UserResource($user);
            return $apiResponseService->efflux($data);
        } else {
            return $apiResponseService->efflux(null);
        }
    }
}
