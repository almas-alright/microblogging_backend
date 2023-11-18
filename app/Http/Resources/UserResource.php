<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'following' => $this->follows()->pluck('following_user_id')->toArray(),
            'reactions' => $this->reactions()->pluck('post_id')->toArray(),
            'profile_image' => $this->profile_image,
            'banner_image' => $this->banner_image,
            'created_at' => $this->created_at,
        ];
    }
}
