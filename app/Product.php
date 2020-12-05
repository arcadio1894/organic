<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'descriptionShort',
        'descriptionLarge', 'unitsInStock', 'unitPrice',
        'image', 'stars', 'weight', 'department_id'];

    protected $dates = ['deleted_at'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // TODO: Ejemplo de relacion de muchos a muchos
    public function carts()
    {
        return $this->belongsToMany('App\Cart', 'cart_products')->withPivot('cart_id', 'quantity', 'price');
    }

}
