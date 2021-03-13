<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $table ='products';
    protected $fillable = ['product_name', 'product_desc', 'product_image','product_price','quantity','size',
                           'product_status','uploaded_by','cat_id','brand_id'];
}
