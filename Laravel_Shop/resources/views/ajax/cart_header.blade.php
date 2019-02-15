<div class="cart">
    <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{Cart::count()}}) <i class="fa fa-chevron-down"></i></div>
    <div class="beta-dropdown cart-body">
        @foreach(Cart::content() as $item)
        <div class="cart-item">
            <div class="media">
                <a class="pull-left" href="#"><img src="source/image/product/{{$item->options->img}}" alt=""></a>
                <div class="media-body">
                    <span class="cart-item-title">{{$item->name}}</span>
                    <span class="cart-item-amount">Số lượng: {{$item->qty}}</span>
                </div>
            </div>
        </div>
        @endforeach

        <div class="cart-caption">
            <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal(0)}}</span></div>
            <div class="clearfix"></div>

            <div class="center">
                <div class="space10">&nbsp;</div>
                <a href="checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div> 