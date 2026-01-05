<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = ['user_id', 'reactable_id', 'reactable_type', 'type'];

    // Reaction belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polymorphic relation
    public function reactable()
    {
        return $this->morphTo();
    }



}
