<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'postcode', 'address', 'city', 'country', 'customer_id',
    ];

    protected $dates = ['deleted_at'];

    // TODO: Ejemplo de relacion de 1 a muchos
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }


}
