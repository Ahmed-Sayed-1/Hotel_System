<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Floor extends Model
{
    use SoftDeletes;

    public function created_by(): MorphTo
    {
        return $this->morphTo();
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }


}
