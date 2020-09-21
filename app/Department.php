<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'image'];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
