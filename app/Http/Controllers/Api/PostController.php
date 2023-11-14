<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Interfaces\PostRepositoryInterface;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ApiResponseService $apiResponseService)
    {
        $data = $this->post->getAll();
        $post = PostResource::collection($data);
        return $apiResponseService->efflux($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ApiResponseService $apiResponseService)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:255'
        ], [

        ]);

        if ($validator->fails()) {
            return $apiResponseService->efflux(null, $validator->messages(), 422);
        }

        $validated = $validator->validated();

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images');
        }

        $data = $this->post->create($validated);

        if ($data->wasRecentlyCreated) {
            $post = new PostResource($data);
            return $apiResponseService->efflux($post);
        } else {
            return $apiResponseService->efflux(null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ApiResponseService $apiResponseService)
    {
        $data = $this->post->find($id);
        if ($data) {
            $post = new PostResource($data);
            return $apiResponseService->efflux($post);
        } else {
            return $apiResponseService->efflux(null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApiResponseService $apiResponseService, string $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|max:255'
        ], [

        ]);

        if ($validator->fails()) {
            return $apiResponseService->efflux(null, $validator->messages(), 422);
        }

        $validated = $validator->validated();

        // Create the post with merged data
        $data = $this->post->update($id, $validated);

        if ($data->wasChanged()) {
            $post = new PostResource($data);
            return $apiResponseService->efflux($post);
        } else {
            return $apiResponseService->efflux(null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ApiResponseService $apiResponseService)
    {
        $deleted = $this->post->delete($id);
        if($deleted){
            return $apiResponseService->efflux(['message' => 'Trashed']);
        } else {
            return $apiResponseService->efflux('');
        }
    }
}
