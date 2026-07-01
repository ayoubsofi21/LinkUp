<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
        use HasFactory, Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'headline', 'company', 'image_url'
    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }
}