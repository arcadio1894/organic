<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'phone', 'user_id',
    ];

    protected $dates = ['deleted_at'];

    //TODO: Ejemplo relacion 1 a muchos
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // TODO: Ejemplo de relacion de muchos a 1
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    // TODO: Ejemplo de relacion de muchos a 1
    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
