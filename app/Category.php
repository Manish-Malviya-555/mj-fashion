<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Protected $table ='categories';
    protected $fillable = ['category_name', 'category_desc', 'category_image',];
}
