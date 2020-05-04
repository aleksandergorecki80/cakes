<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['id', 'content', 'rating', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Zmiany w modelu
    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
