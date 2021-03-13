<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    Protected $table ='brands';
    protected $fillable = ['brand_name', 'brand_desc', 'brand_image',];

}
