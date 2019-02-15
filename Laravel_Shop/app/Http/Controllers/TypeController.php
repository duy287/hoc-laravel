<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\type_product;
use App\product;

class TypeController extends Controller
{
    function getProductsByType($id_type){
        $type = type_product::find($id_type); //mục đích để in thông tin loại sp

        //lấy ds sản phẩm của loại này và phân trang 
        $productsByType = product::where('id_type',$id_type)->paginate(6);

        return view('product_type',['type'=>$type, 'productsByType'=>$productsByType]);
    }
}
