<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = ['user_id', 'domain'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
