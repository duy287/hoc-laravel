@extends('layout.master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Product</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Product</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                {{-- Chi tiết sản phẩm --}}
                <div class="row">
                    <div class="col-sm-4">
                        <img src="source/image/product/{{$product->image}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">{{$product->name}}</p>
                            <p class="single-item-price">
                                <span>{{ number_format($product->unit_price)}}</span>
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Lựa chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="size">
                                <option>Kịch thước</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Màu sắc</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Black">Black</option>
                                <option value="White">White</option>
                            </select>
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                {{-- Sản phẩm tương tự --}}
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>
                    <div class="row">
                        @foreach($related_Products as $item)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($item->promotion_price>0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                <div class="single-item-header">
                                    <a href="product-detail/{{$item->id}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$item->name}}</p>
                                    <p class="single-item-price">
                                        @if($item->promotion_price>0)
                                            <span class="flash-del">{{number_format($item->unit_price)}}</span>
                                            <span class="flash-sale">{{number_format($item->promotion_price)}}</span>
                                        @else
                                            <span class="flash-sale">{{number_format($item->unit_price)}}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <span class="add-to-cart pull-left" data-id="{{$item->id}}"><i class="fa fa-shopping-cart"></i></span>
                                    <a class="beta-btn primary" href="product-detail/{{$item->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                {{-- Sản phẩm bán chạy --}}
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm bán chạy</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($product_top as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product-detail/{{$item->id}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    <span class="beta-sales-price">{{number_format($item->unit_price)}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> 
                {{-- Sản phẩm mới --}}
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($product_new as $item)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="product-detail/{{$item->id}}"><img src="source/image/product/{{$item->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$item->name}}
                                    <span class="beta-sales-price">{{number_format($item->unit_price)}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
</div>
@endsection