@extends('layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Shopping Cart</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Shopping Cart</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <div class="table-responsive">
            <!-- Shop Products Table -->
            <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Total</th>
                        <th class="product-remove">Xoá</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($cart as $item)
                    <tr class="cart_item cart-item-{{$item->rowId}}" >
                        <td class="product-name" style="padding:20px">
                            <div class="media">
                                <img src="source/image/product/{{$item->options->img}}" alt="">
                                <div class="media-body" style="text-align: center">
                                    {{$item->name}}
                                </div>
                            </div>
                        </td>

                        <td class="single-item-price">
                            <span class="flash-sale">{{number_format($item->price)}}</span>
                        </td>

                        <td class="product-quantity">
                            <select name="product-qty" row-id="{{$item->rowId}}" class="product-qty">
                                @for($i=1; $i<=5; $i++)
                                    <option value="{{$i}}" @if($item->qty==$i) {{'selected'}}  @endif>
                                        {{$i}}
                                    </option>
                                @endfor
                            </select>
                        </td>

                        <td class="product-subtotal">
                            <span class="amount total-item-{{$item->rowId}}">{{number_format($item->subtotal)}}</span>
                        </td>

                        <td class="product-remove">
                            <input type="button" class="btn btn-default delete-itemCart" row-id="{{$item->rowId}}" value="Delete">
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" class="actions">
                            <a href="shopping-cart/destroy" class="beta-btn primary" name="delete cart">Delete cart<i class="fa fa-trash-o"></i></a> 
                            <button type="submit" class="beta-btn primary" name="checkout">Checkout <i class="fa fa-chevron-right"></i></button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="cart-collaterals">
            <div class="cart-totals pull-right">
                <div class="cart-totals-row"><h5 class="cart-total-title">Cart Totals</h5></div>
                <div class="cart-totals-row"><span>Cart total:</span> <span class="cart-total">{{Cart::subtotal(0)}}</span></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div> 
</div>
@endsection

@section('script')
    <script>
    $(document).ready(function($) {    
        $('.delete-itemCart').click(function(){
            var rowId = $(this).attr('row-id');
            // alert(rowId);
            $.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	//token secutity
  				},
				url:'shopping-cart/delete',
				type:'POST',
                dataType: 'json',
				data:{
					rowId: rowId,
				},
				success: function(response){
                    if(response.status ==1){
                        $('.cart-item-'+ rowId).remove();
                        $('.cart-total').html(response.total);
                    }
				},
				error: function(error){
					console.log(error);
				}
			})
        })

        $('.product-qty').change(function(){
            var soluong = $(this).val();
            var rowId = $(this).attr('row-id');

            $.ajax({
				headers: {
    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')	//token secutity
  				},
				url:'shopping-cart/update',
				type:'POST',
                dataType: 'json',
				data:{
					rowId: rowId,
                    soluong:soluong
				},
				success: function(response){
                    if(response.status ==1){
                        $('.total-item-'+ rowId).html(response.item_total);
                        $('.cart-total').html(response.total);
                    }
				},
				error: function(error){
					console.log(error);
				}
            })
        })
    })



    </script>
@endsection