<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ApiResponseService $apiResponseService)
    {
        $query = $request->query('search');
        $data = User::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();
        return $apiResponseService->efflux($data);
    }
}
