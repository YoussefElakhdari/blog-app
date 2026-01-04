<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone',
        'date_of_birth',
        'bio',
        'profile_pic',
        'role',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tokens',
    ];


    protected $appends = ['profile_pic_url'];

    // A user can have many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // a user can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // a user can have react to many posts/comments
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    // A user can save many posts
    public function savedPosts()
    {
        return $this->belongsToMany(Post::class, 'saved_posts')->withTimestamps();
    }

    public function getProfilePicUrlAttribute()
    {
        return url('images/profiles/' . $this->profile_pic);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
}
