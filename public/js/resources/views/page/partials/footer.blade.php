<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Đồng hồ </span>& Phong cách</h2>
                        <p>Nơi đâu có ánh sáng- ở đó có năng lượng</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="img/appwatch.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="img/Casio_MTP.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="img/Galaxy-Watch.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="img/Citizen_NH8353-00H.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <a href="/"><img src="img/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Cửa hàng</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Thanh toán khi nhận hàng</a></li>
                            <li><a href="{{route('cartt.index')}}">Đặt hàng tại đây</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Chính sách</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Tư vấn trực tuyến miễn phí</a></li>
                            <li><a href="#">Chế độ bảo hành 6 tháng</a></li>
                            <li><a href="#">Thay màn hình</a></li>
                            <li><a href="#">Bảo hành keo</a></li>
                            <li><a href="#">Thay thế phụ kiện</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Về với chúng tôi</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Của hàng ShopWatch</a></li>
                            <li><a href="#">Địa chỉ: 99 Hồ Đắc Di, thành phố Huế</a></li>
                            <li><a href="#">Số điện thoại: 0123456789</a></li>
                            <li><a href="#">Email: shopWatch@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Shop Watch</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i
                                    class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Chào mừng bạn đến với <br />của hàng bán đồng hồ trực tuyến Shop Watch</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 ShopWatch Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank"
                            href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
{{-- <script src="js/main.js"></script> --}}
<script src="js/toastr.min.js"></script>
<script src="js/back-to-top.js"></script>
@stack('qty')
@include('page.partials.footer_ajax')

</body>

</html>