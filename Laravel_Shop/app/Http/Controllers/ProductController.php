<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //using for Query bulder
use App\product;
use App\bill_detail; 

class ProductController extends Controller
{
    function getProductDetail($id){
        $product = product::find($id);

        //các sản phẩm cùng loại với sản phẩm đang chọn (trừ nó)
        $related_Products = product::where([
            ['id_type',$product->id_type],
            ['id','!=',$product->id]
        ])->take(6)->get();

        //các sản phẩm bán chạy
        $product_top = DB::table('products')
            ->select(DB::raw('products.*, id_product, count(products.id) as soluong'))
            ->join('bill_detail', 'bill_detail.id_product', '=', 'products.id')
            ->groupBy('id_product')
            ->orderBy('soluong','desc')
            ->take(4)->get();
        
        //sản phẩm mới
        $product_new = product::where('new',1)->take(4)->get();

        return view('product_detail', [
            'product'=>$product,
            'related_Products'=>$related_Products,
            'product_top'=>$product_top,
            'product_new'=>$product_new
            ]);
    }
}
