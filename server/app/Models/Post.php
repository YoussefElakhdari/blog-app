<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasFactory;

    
    protected $fillable = ['user_id', 'title', 'description'];

    // A post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A post can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // A post can have many images
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    // A post can have many reactions
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    // A post can be saved by many users
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_posts')->withTimestamps();
    }





}
