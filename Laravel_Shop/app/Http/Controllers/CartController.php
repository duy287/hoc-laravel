<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;
class CartController extends Controller
{
    function getShoppingCart(){
        $cart =Cart::content();
        return view('shopping_cart', ['cart'=> $cart]);
    }
    function addItem(Request $request){
        $id = $request->id;
        $soluong = $request->soluong;

        $product = product::find($id);
        $gia = $product->unit_price;
        if($product->promotion_price>0){
            $gia = $product->promotion_price;
        }
        $total = $gia*$soluong;

        //Cart::add(id_san_pham, ten_san_pham, so_luong, gia,['thongtin' => ‘noi dung thong tin’]);
        Cart::add($product->id, $product->name, $soluong, $gia,['img' => "$product->image", 'total'=>$total]);

        return view('ajax.cart_header');
    }

    function updateItem(Request $request){
        $rowId = $request->rowId;
        $soluong = $request->soluong;
        
        Cart::update($rowId, ['qty' => $soluong]);
        
        echo json_encode([
            'status'=> 1,
            'item_total'=> Cart::get($rowId)->subtotal(0),
            'total'=>Cart::subtotal(0)
        ]);
    }

    function deleteItem(Request $request){
        $rowId = $request->rowId;
        Cart::remove($rowId);

        echo json_encode([
            'status'=> 1,
            'total'=>Cart::subtotal(0)
        ]);
    }

    function destroyCart(){
        Cart::destroy();
        return redirect('shopping-cart');
    }

}
