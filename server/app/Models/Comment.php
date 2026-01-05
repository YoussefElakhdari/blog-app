<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'content'];

    // Comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A comment belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // A comment can have many reactions
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    
}
