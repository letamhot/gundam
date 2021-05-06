@extends('page.partials.layout')

@section('title', 'Trang chủ')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Loại sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        @foreach ($categories as $type)

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{route('categoryDetail', $type->slug)}}">{{ $type->name }}</a></h4>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <!--/category-products-->

                    <div class="brands_products">
                        <!--brands_products-->
                        <h2>Sản phẩm</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <span class="pull-right">Số lượng
                                    </span>Tên sản phẩm
                                </li>
                            </ul>
                            @foreach ($products as $product)
                            <ul class="nav nav-pills nav-stacked">

                                <li><a href="{{ route('productdetail', $product->id) }}">
                                        <span class="pull-right">{{ $product->amount }}
                                        </span>{{ $product->name }}
                                    </a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <?php $i = 0 ;?>
                    <h2 class="title text-center">Danh sách sản phẩm</h2>
                    @foreach ($category->products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper" style="margin-bottom: 10px">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{ route('productdetail', $product->id) }}">
                                        @if($product->sum('amount') > 0)
                                        <img src="{{asset(Storage::url($product->image )) }}" alt="" height="180px" /></a>
                                    @else
                                    <img src="{{asset(Storage::url($product->image )) }}" alt="" height="180px"
                                        style="-webkit-filter: blur(2px);" /></a>
                                    @endif

                                    {{-- <form action="{{ route('AddShoppingCart', $product->id) }}" method="GET">
                                    @csrf --}}
                                    @if($product->sum('amount') > 0)
                                    <h2>{{ number_format($product->price) }} VND</h2>

                                    <input type="hidden" value="{{ $product->sum('amount') }}"
                                        name="check_stock">

                                    <a onclick="AddCartPost({{ $product->id }})"
                                        class=" btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>

                                    @else

                                    <h2><span style="color:red">Hết hàng</span> <br>
                                        <span
                                            style="color: #b2b2b2; text-decoration: line-through">{{ number_format($product->price) }}
                                            VND
                                        </span>
                                    </h2>

                                    @endif
                                    {{-- </form> --}}
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <?php $i++?>
                    @endforeach
                </div>
                <!--features_items-->

                <!--/category-tab-->

                
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
@endsection