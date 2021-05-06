@extends('page.partials.layout')

@section('title', 'Trang chủ')

@section('content')


<section id="slider">
    <!--slider-->

    <div class="container">


        @include('partials.message')

        <div class="row">

            <div class="col-sm-12">

                <div id="slider-carousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span> P-Bandai PG 1/60 </span>Gundam 00 Raiser</h1>
                                <h2>Color Clear Body Set</h2>
                                <p>Số lượng có hạn</p>
                                <button type="button" class="btn btn-default get">Vào ngay</button>
                            </div>
                            <div class="col-sm-6">
                                @if(!empty($slides->image))
                                <img src="{{asset(Storage::url($slides->image))}}" style="margin-left: 100px;"
                                    width="400px" height="400px" class="girl img-responsive" alt="" />
                                @endif
                            </div>
                        </div>
                        @foreach ($slides1 as $slide)
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>Gundam, </span> không chỉ là đồ chơi</h1>
                                <h2>Mà nó là đam mê của bạn</h2>
                                <p>Gundam, not just toys, it's your hobby</p>
                                <button type="button" class="btn btn-default get">Vào ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset(Storage::url($slide->image))}}" style="margin-left: 100px;"
                                    width="400px" height="400px" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png" class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Loại sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        @foreach ($types as $type)

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
                    @foreach ($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper" style="margin-bottom: 10px">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{ route('productdetail', $product->id) }}">
                                        @if($product->amount > 0)
                                        <img src="{{asset(Storage::url($product->image )) }}" alt="" height="180px" /></a>
                                    @else
                                    <img src="{{asset(Storage::url($product->image )) }}" alt="" height="180px"
                                        style="-webkit-filter: blur(2px);" /></a>
                                    @endif

                                    {{-- <form action="{{ route('AddShoppingCart', $product->id) }}" method="GET">
                                    @csrf --}}
                                    @if($product->amount > 0)
                                    <h2>{{ number_format($product->price) }} VND</h2>

                                    <input type="hidden" value="{{ $product->amount }}"
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

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php $i = 0 ;?>

                                @foreach ($product1 as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="{{ route('productdetail', $product->id) }}">
                                                    @if($product->amount > 0)
                                                    <img src="{{asset(Storage::url($product->image )) }}" alt=""
                                                        height="180px" /></a>
                                                @else
                                                <img src="{{asset(Storage::url($product->image )) }}" alt=""
                                                    height="180px" style="-webkit-filter: blur(2px);" /></a>
                                                @endif

                                                {{-- <form action="{{ route('addCart', $product->id) }}" method="GET">
                                                @csrf --}}
                                                @if($product->amount > 0)
                                                <h2>{{ number_format($product->price) }} VND</h2>

                                                <input type="hidden" value="{{ $product->amount }}"
                                                    name="check_stock">

                                                <a onclick="AddCartPost({{ $product->id }})"
                                                    class=" btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>

                                                @else

                                                <h2><span style="color:red">Hết hàng</span> <br>
                                                    <span
                                                        style="color: #b2b2b2; text-decoration: line-through">{{ number_format($product->price) }}
                                                        VND</span></h2>

                                                @endif
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++?>

                                @endforeach
                            </div>

                            <div class="item">

                                @foreach ($product2 as $item)

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset(Storage::url($item->image )) }}"
                                                    alt="{{ $item->name }}" height="180px"/>
                                                <h2>{{ number_format($item->price) }} VND</h2>
                                                <a onclick="AddCartPost({{ $product->id }})" class=" btn
                                                    btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
@endsection
