<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected  $guarded = ['id', 'created_at', 'updated_at'];

    public function  user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
