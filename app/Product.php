<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'tbl_products';
    protected $fillable = ['thumb_main', 'name_product', 'product_cat_parent', 'creator'];
}
