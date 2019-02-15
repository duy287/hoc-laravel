<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //using for Query bulder
use App\type_product;
use App\product;
use App\slide;

class IndexController extends Controller
{
    function getTrangChu(){
        $slide = slide::all();
        $product_new = product::where('new', 1)->take(4)->get();

        /*
        SELECT p.*, b.id_product, COUNT(p.id) as soluong 
        FROM products p JOIN bill_detail b ON b.id_product = p.id
        GROUP BY b.id_product 
        ORDER BY soluong DESC
        */
        $product_top = DB::table('products')
            ->select(DB::raw('products.*, id_product, count(products.id) as soluong'))
            ->join('bill_detail', 'bill_detail.id_product', '=', 'products.id')
            ->groupBy('id_product')
            ->orderBy('soluong','desc')
            ->take(8)->get();

        return view('index',[
            'slide'=>$slide,
            'product_new'=>$product_new, 
            'product_top'=>$product_top
        ]);
    }
}
