<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'tbl_posts';
    protected $fillable = ['post_name', 'creator'];
}
