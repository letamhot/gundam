@extends('page.partials.layout')

@section('title', 'Shop')

@section('content')
<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Loại sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <div class="panel panel-default">

                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($category as $categories)
                                        <li><a href="">{{ $categories->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @foreach ($category as $categories)
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  href="{{route('categoryDetail', $categories->slug)}}">
                                        <span class="badge pull-right"></span>{{ $categories->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="men" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($products as $product)
                                        @if($product->id_category = $categories->id)
                                        <li><a href="">{{ $product->name }}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
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
                                    </span>Sản phẩm
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
                    <!--/brands_products-->
                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">BLOG CỦA CHÚNG TÔI</h2>
                    @foreach ($products as $product)
                    <div class="single-blog-post">
                        <h3><a href="{{route('productdetail', $product->id)}}">{{$product->name}}</a></h3>
                        <a href="{{route('productdetail', $product->id)}}">
                            <img src="{{asset(Storage::url($product->image))}}" alt="">
                        </a>
                        <p>{{$product->description}}</p>
                    </div>
                    <hr>
                    @endforeach
                    
                    <div class="pagination-area">
                        {{-- <ul class="pagination">
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                        </ul> --}}
                        {!! $products->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
