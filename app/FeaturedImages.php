<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedImages extends Model
{
    //
    function post()
    {
        return $this->belongsTo('App\Post');
    }
}
