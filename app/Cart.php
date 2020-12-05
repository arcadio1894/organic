<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'active', 'customer_id', 'state',
    ];

    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    // TODO: Ejemplo de relacion de muchos a muchos
    public function products()
    {
        return $this->belongsToMany('App\Product', 'cart_products')->withPivot('product_id', 'quantity', 'price');
    }

}
