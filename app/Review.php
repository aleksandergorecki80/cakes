<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

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
