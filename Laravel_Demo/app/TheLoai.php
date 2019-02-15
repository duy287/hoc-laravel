<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table='TheLoai';
    
    public function loaitin(){
        return $this->hasMany('App\LoaiTin', 'idTheLoai','id');
    }
    public function tintuc(){
        //prametter: Model lien ket toi, Model trung gian, khoa ngoai trung gian, khoa ngoai can toi, khoa chinh
        return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin','idTheLoai','idLoaiTin', 'id');
    }
}
