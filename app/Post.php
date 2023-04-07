<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tbl_posts';
    protected $fillable = ['title', 'creator', 'desc'];

    #One to One
    function FeaturedImages()
    {
        return $this->hasOne('App\FeaturedImages');
    }

    #One to Many
    function user()
    {
        return $this->belongsTo('App\User');
    }
}
