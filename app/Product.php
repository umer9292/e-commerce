<?php

namespace App;

use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function productImage()
    {
        return $this->hasOne('App\ProductImage');
    }

}
