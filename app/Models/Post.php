<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
