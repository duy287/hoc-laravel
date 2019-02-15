<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    function type_product(){
        return $this->belongsTo('App\type_product', 'id_type', 'id');
    }
}
