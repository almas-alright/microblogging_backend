<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'content', 'image' ];

    public function getTweetImageAttribute($value)
    {
        return asset($value ? 'storage/'.$value : null);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->reactions()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->user()->id,
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->reactions
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->reactions
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function scopeWithReactions(Builder $query)
    {
        $query->leftJoinSub('select post_id, sum(liked) likes, sum(!liked) dislikes from reactions group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );

    }
}
