<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price'];

}
