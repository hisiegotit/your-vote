<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const PAGINATION_COUNT = 10;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class); // user_id
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // category_id
    }

    public function status()
    {
        return $this->belongsTo(Status::class); // status_id
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes'); // idea_id
    }

    public function isVotedByUser(?User $user)
    {
        if (!$user) {
            return false;
        }

        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }

    public function vote(User $user)
    {
        Vote::create([
            'idea_id' => $this->id,
            'user_id' => $user->id,
        ]);
    }

    public function unVote(User $user)
    {
        Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->first()
            ->delete();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
