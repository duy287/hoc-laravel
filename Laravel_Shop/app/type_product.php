<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_product extends Model
{
    protected $table = "type_products";
    function products(){
        return $this->hasMany('App\product', 'id_type', 'id');
    }
}
