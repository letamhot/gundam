<section id="cart_items">
    <div class="container">

        @include('partials.message')

        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ route('gumdamstore') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của {{ Auth::user()->name }}</li>
            </ol>
        </div>
        <form action="{{ route('cartt.store') }}" method='POST' enctype="multipart/form-data">
            @csrf
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="id">#</td>
                            <td class="image">Ảnh sản phẩm</td>
                            <td class="product" width='30%' style="text-align: center">Sản phẩm</td>
                            <td class="price">Giá tiền</td>
                            <td class="quantity">Số lượng đặt hàng</td>
                            <td class="amount">Số lượng</td>
                            <td class="total">Tổng tiền phải trả</td>
                            <td width='5%'><i class="ti-close"></i>Xóa</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>

                        @foreach(Cart::instance(Auth::user()->id)->content() as $key => $item)

                        <tr>
                            <td class="id">{{ $i+1 }}</td>
                            <td class="cart_image">
                                <a href="{{ route('productdetail', $item->id) }}"><img
                                        src="{{asset(Storage::url($item->options->img))  }}" alt="{{ $item->name }}"
                                        width="100px"></a>
                            </td>
                            <td class="cart_product">
                                <h4 style="width:75%"><a href="{{ route('productdetail', $item->id) }}">{{ $item->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($item->price,0,".",",") }} VND</p>
                            </td>

                            <td class="cart_quantity">

                                <div class="quantity">
                                    <div class="form-group">
                                        <input type="number" name="qty" class="form-control qty"
                                            value="{{ $item->qty }}" min='1' data-id="{{ $item->rowId }}"
                                            id="quantityItem{{ $item->rowId }}">
                                    </div>
                                </div>

                            </td>

                            <td class=" cart_amount">
                                <input type="hidden" name="check_availability" value="{{ $product->amount }}">
                                {{ $product->amount }}
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{number_format($item->priceTotal,0,".",",") }} VND</p>
                            </td>
                            <td class=" cart_delete">
                                <a type="submit" href="{{route('deleteListCart', $item->rowId)}}"><i
                                        class="fa fa-times fa-lg" ></i></a>
                            </td>

                        </tr>
                        <?php $i++; ?>

                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3> Bạn muốn làm gì tiếp theo?</h3>
            <p>Chọn xem bạn có mã giảm giá hoặc điểm thưởng muốn sử dụng hoặc muốn ước tính chi phí giao hàng của mình.
            </p>
        </div>
        @if(Cart::instance(Auth::user()->id)->count() != 0)
        <div class="row">
            <div class="col-lg-4">
                <div class="cart-buttons">
                    {{-- <a href="{{ route('shop') }}" class="primary-btn continue-shop">Continue
                    shopping</a><br> --}}
                    <h4>Địa chỉ nhận hàng:</h4> <br />
                    <span>{{ Auth::user()->address }}</span>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Thay
                        đổi</button>
                    <br><br>
                    <h4>Số điện thoại:</h4> <br />
                    <span>+84 {{ Auth::user()->phone }}</span><br /><br />
                    <h4>Email: </h4> <br />
                    <span>Email&nbsp;: {{ Auth::user()->email }}</span>

                    {{-- <a href="#" class="primary-btn up-cart">Update cart</a> --}}
                </div>
            </div>

            <div class="col-lg-4">
                <div class="discount-coupon">
                    <h6>Phương thức thanh toán
                    </h6>
                    <div>
                        <label><input type="radio" name="payment" value="Payment on delivery" class="red" checked>
                            Thanh toán lúc nhận hàng</label> <br />
                        <div class="red card box" style="display: block">Ít nhất<strong> @- 4 ngày
                            </strong>giao hàng
                        </div>
                        <label><input type="radio" name="payment" value="Pay by credit card" class="green">
                            Chuyển khoản trước</label> <br />
                        <div class="green card box">tài khoản ngân hàng:
                            @if(Auth::user())
                            <br>- Số tài khoản: 123 456 78910

                            <br>- Tên chủ tài khoản: {{Auth::user()->name}}
                            <br>- Bank Vietinbank, Hue
                            @else
                            <br>- Số tài khoản: 55610000137111
                            <br>- Tên chủ tài khoản: Nguyễn Văn Dần
                            <br>- Bank BIDV, Hue

                            @endif
                        </div>
                    </div>
                </div>
                <div class="discount-coupon">
                    <h6>Mã giảm giá</h6>
                    <button type="button" class="btn btn-primary proceed-btn" style="width: 100%" data-toggle="modal"
                        data-target="#exampleModal1">
                        Nhập mã giảm giá
                    </button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="proceed-checkout">
                    <ul>
                        <li class="subtotal">Tổng giá sản phẩm:
                            <span><?php echo Cart::instance(Auth::user()->id)->priceTotal(0,0, '.'); ?>
                                VND</span></li>
                        <li class="cart-total" style="font-size: 20px;">Tổng tiền phảm trả:
                            <span>{{ (Cart::instance(Auth::user()->id)->priceTotal(0,0, '.')) }}VND </span>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary proceed-btn" style="width: 100%" data-toggle="modal"
                        data-target="#exampleModal">
                        Xác nhận đặt hàng
                    </button>

                    <!-- Modal PROCEED TO CHECK OUT -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel" style="color:blue;">Xác nhận
                                        đặt hàng trả về hóa đơn</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn thông tin này là chính xác?
                                    <br>
                                    Chúng tôi sẽ gửi email để xác nhận đơn hàng của bạn!
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Thoát">
                                    <input type="submit" class="btn btn-primary" value="Xác nhận">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        @endif

    </div>

</section>
<!-- Shopping Cart Section End -->

<!-- Modal address -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('change_address') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="color: blue; margin: auto">Thay đổi địa chỉ</h3>
                </div>
                <div class="modal-body">
                    <p>Địa chỉ hiện tại: <b>{{ Auth::user()->address }}</b></p>
                    <p>Địa chỉ gửi hàng: <input type="text" placeholder="Address" name="address" class="form-control">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <input type="submit" class="btn btn-primary" value="Thay đổi">
                </div>
            </div>
        </form>
    </div>

</div>
<!--/#do_action-->