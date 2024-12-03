<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'active', 'title', 'excerpt', 'body', 'photo'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
