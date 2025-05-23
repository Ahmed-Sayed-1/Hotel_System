<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $table = 'managers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'nationalId',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function receptionists(): MorphMany
    {
        return $this->morphMany(Receptionist::class, 'created_by');
    }

    public function clients(): MorphMany
    {
        return $this->morphMany(Client::class, 'created_by');
    }

    public function floors(): MorphMany
    {
        return $this->morphMany(Floor::class, 'created_by');
    }

    public function bans(): MorphMany
    {
        return $this->morphMany(Ban::class, 'banned_by');
    }

    public function rooms(): MorphMany
    {
        return $this->morphMany(Room::class, 'created_by');
    }
}
