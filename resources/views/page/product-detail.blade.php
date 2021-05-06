@extends('page.partials.layout')

@section('title', 'Product-Detail')

@section('content')
<section>
    <div class="container">

        @include('partials.message')

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

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset(Storage::url( $id_product->image )) }}" alt="" />
                            <h3>Sản phẩm</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image1 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image2 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                </div>
                                <div class="item ">
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image1 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image2 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                </div>
                                <div class="item ">
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image1 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                    <a href=""><img src="{{asset(Storage::url( $id_product->image2 )) }}" alt=""
                                            width="85px" height="85px"></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <input type="hidden" value="{{ $id_product->sum('amount') }}">

                        <div class="product-information">
                            <!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />

                            @if($id_product->sum('amount') < 1) <h2
                                style='color: white; font-size: 30px; font-weight: bold; border: solid red; max-width: 230px; text-align: center; background: red;'>
                                Hết hàng</h2>

                                <h2>{{ $id_product->name }}</h2>
                                <p><b>Loại sản phẩm:</b> {{ $id_product->category['name'] }}</p>
                                <span>
                                    <span style="text-decoration: line-through; color: #b2b2b2"><b>Giá sản
                                            phẩm:</b>{{ number_format($id_product->price, 0,".",",") }}
                                        VND</span>
                                </span>
                                @else
                                <h2>{{ $id_product->name }}</h2>
                                <p><b>Loại sản phẩm:</b> {{ $id_product->category['name'] }}</p>

                                <span><b>Giá sản phẩm:</b>{{ number_format($id_product->price, 0,".",",") }}
                                    VND</span>

                                <div class="sc-item">

                                    <div>
                                        <input id="qty" type="number" value="1" style="display: flex; width: 60px;"
                                            class="qtyexample" data-id=" {{ $id_product->sum('amount') }}" name="qty" />

                                    </div>
                                </div>
                                <div style="margin-top: 20px;">
                                    @if(Auth::user())
                                    @if($id_product->sum('amount') > 0)
                                    <a onclick="AddCartPost({{ $id_product->id }})" class="btn btn-default add-to-cart"
                                        style="border: none" href="javascript:"><i class="fa fa-shopping-cart"></i>Thêm
                                        vào giỏ</a>
                                    @else
                                    <a href="javascript:window.location.href=window.location.href"
                                        class="btn primary-btn pd-cart disabled" aria-disabled="true">Thêm vào giỏ</a>
                                    @endif
                                    @endif
                                </div>
                                <input type="hidden" id="check_stock" name="check_stock"
                                    value="{{ $id_product->sum('amount') }}" style="display: flex">
                                <p style="padding-top: 20px;" id="quantity" name="qty"><b>Số lượng:</b>
                                    {{ $id_product->amount }} sản phẩm</p>
                                <p><b>Status:
                                        @if( $id_product->new == 1)
                                    </b> Mới</p>
                                @else
                                </b> Cũ</p>
                                @endif
                                <p><b>Nhà phân phối:</b> {{ $id_product->producer->name }}</p>
                               

                                @endif
                        </div>

                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab" role="tab">Xem sản phẩm</a></li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">Xem chi tiết sản phẩm</a>
                            </li>
                            @if(empty($comment->comment))
                            <li class="active"><a href="#reviews" data-toggle="tab" role="tab">Số lượng comment
                                    (0)</a>
                            </li>
                            @else
                            <li class="active"><a href="#reviews" data-toggle="tab" role="tab">Số lượng comment
                                    ({{ count($comment->comment) }})</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details">
                            @foreach ($products as $product)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('productdetail', $product->id) }}">
                                                @if($product->amount > 0)

                                                <img src="{{asset(Storage::url( $product->image )) }}" alt="{{$product->name}}" style="width:100%; height:180px" /></a>
                                            @else
                                            <img src="{{asset(Storage::url( $product->image )) }}" alt="{{$product->name}}"
                                                style="-webkit-filter: blur(2px); width:100%; height:180px" /></a>
                                            @endif
                                            @if($product->amount > 0)
                                            <h2>{{ $product->price }}</h2>
                                            <a href="{{ route('productdetail', $product->id) }}"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                            @else

                                            <h2><span style="color:red">Hết hàng</span> <br>
                                                <span
                                                    style="color: #b2b2b2; text-decoration: line-through">{{ number_format($product->price,  0,".",",") }}
                                                    VND</span></h2>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                            <div class="specification-table">
                                <table>

                                    <tr>
                                        <td class="p-catagory">Giá sản phẩm: </td>
                                        <td>
                                            <div class="p-price">
                                                {{ ($id_product->price) }} VND
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-catagory">Số lượng đặt hàng :</td>
                                        <td>
                                            <div class="p-stock">{{ $id_product->amount }} trong kho
                                            </div>
                                        </td>
                                    </tr>
                                    
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade active in" id="reviews">
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                            </ul>
                            <img src="{{asset(Storage::url( $id_product->image )) }}" style=" aligh:center;width: 60rem;
                                    height: 40rem;" alt="" />
                            <br>
                            <p aligh:"center"><b>Giới thiệu sản phẩm: </b> {!! $id_product->description !!}</p>

                            @if(Auth::user())


                            @comments(['model' => $id_product])

                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <!--/category-tab-->

            <div class="recommended_items">
                <!--recommended_items-->
                <h2 class="title text-center">Danh sách sản phẩm</h2>
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach ($product1 as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('productdetail', $product->id) }}">
                                                @if($product->sum('amount') > 0)
                                                <img src="{{asset(Storage::url( $product->image )) }}" alt=""
                                                    height="180px" /></a>
                                            @else
                                            <img src=" {{asset(Storage::url( $product->image )) }}" alt=""
                                                height="180px" style="-webkit-filter: blur(2px);" /></a>
                                            @endif
                                            @if($product->sum('amount') > 0)
                                            <h2>{{ number_format($product->price, 0,".",",") }} VND</h2>

                                            <input type="hidden" value="{{ $product->amount }}" name="check_stock">

                                            <a href="{{ route('productdetail', $product->id) }}"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>

                                            @else

                                            <h2><span style="color:red">Hết hàng</span> <br>
                                                <span
                                                    style="color: #b2b2b2; text-decoration: line-through">{{ number_format($product->price, 0,".",",") }}
                                                    VND</span></h2>

                                            @endif
                                            {{-- </form>  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="item">

                            @foreach ($product2 as $item)

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('productdetail', $item->id) }}">
                                                @if($item->sum('amount') > 0)
                                                <img src="{{asset(Storage::url( $item->image )) }}" alt=""
                                                    height="180px" /></a>
                                            @else
                                            <img src=" {{asset(Storage::url( $item->image )) }}" alt=""
                                                height="180px" style="-webkit-filter: blur(2px);" /></a>
                                            @endif
                                            @if($item->sum('amount') > 0)
                                            <h2>{{ number_format($item->price, 0,".",",") }} VND</h2>

                                            <input type="hidden" value="{{ $item->sum('amount') }}" name="check_stock">

                                            <a href="{{ route('productdetail', $item->id) }}"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>

                                            @else

                                            <h2><span style="color:red">Hết hàng</span> <br>
                                                <span
                                                    style="color: #b2b2b2; text-decoration: line-through">{{ number_format($item->price, 0,".",",") }}
                                                    VND</span></h2>

                                            @endif
                                            {{-- </form>  --}}
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
@push('qty')
<script>
    $('.equipCatValidation').on('keyup keydown', function(e) {
        for (i = 0; i < 100; i++) {
            var availability = $(this).data("id" + i);
            console.log(availability);
            var KeysPressedTrue = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 46, 8, 112, 113, 114, 115, 116, 117,
                118, 119, 120, 121, 122, 123
            ].indexOf(e.which) > -1;
            if (!KeysPressedTrue) {
                return false;
            }
            if ($(this).val() > availability) {
                e.preventDefault();
                $(this).val(availability);
            }
        }
    });
    $('.qtyexample').on('keyup keydown', function(e) {
        var totalqty = $(this).data("id");
        var KeysPressedTrue = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 46, 8, 112, 113, 114, 115, 116, 117, 118,
            119, 120, 121, 122, 123
        ].indexOf(e.which) > -1;
        if (!KeysPressedTrue) {
            return false;
        }
        if ($(this).val() > totalqty) {
            e.preventDefault();
            $(this).val(totalqty);
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('label').click(function() {
            $('label').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
{{-- <script>
    $(document).ready(function() {
        $("#star5").click(function() {
            $(".stars").html("<b style='color: orange'>Excellent</b>");
        });
        $("#star4").click(function() {
            $(".stars").html("<b style='color: green'>Very good</b>");
        });
        $("#star3").click(function() {
            $(".stars").html("<b style='color: blue'>Normal</b>");
        });
        $("#star2").click(function() {
            $(".stars").html("<b style='color: red'>Bad</b>");
        });
        $("#star1").click(function() {
            $(".stars").html("<b style='color: #A52A2A'>Very bad</b>");
        });
    });
</script> --}}
<script>
    $('#comment').keyup(function() {
        var characterCount = $(this).val().length,
            current = $('#current_comment'),
            maximum = $('#maximum_comment'),
            theCount = $('#the-count_comment');
        var maxlength = $(this).attr('maxlength');
        var changeColor = 0.75 * maxlength;
        current.text(characterCount);
        if (characterCount > changeColor && characterCount < maxlength) {
            current.css('color', '#FF4500');
            current.css('fontWeight', 'bold');
        } else if (characterCount >= maxlength) {
            current.css('color', '#B22222');
            current.css('fontWeight', 'bold');
        } else {
            var col = maximum.css('color');
            var fontW = maximum.css('fontWeight');
            current.css('color', col);
            current.css('fontWeight', fontW);
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#my-form").submit(function(e) {
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").addClass('button-clicked');
            return true;
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#my-form2").submit(function(e) {
            $("#btn-submit2").attr("disabled", true);
            $("#btn-submit2").addClass('button-clicked');
            return true;
        });
    });
</script>
@endpush