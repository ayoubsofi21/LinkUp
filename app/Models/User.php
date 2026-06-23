<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable {
    protected $fillable = [
        'name', 'email', 'password', 'headline', 'company', 'image_url'
    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
}