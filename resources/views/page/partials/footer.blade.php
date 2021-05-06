<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span> Gundam, </span> không chỉ là đồ chơi </h2>
                        <p>Mà nó là đam mê của bạn </p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/avatar/2.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/avatar/3.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/avatar/4.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/avatar/1.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <a href="/"><img src="img/logo.png" alt="" style="border-radius:50% ; width:180px; height:180px" /></a>
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
                        <h2>Về chúng tôi</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Chuyên bán mô hình Gundam giá rẻ nhất, chính hãng Bandai. 
                                            Giao hàng toàn quốc. Tư vấn, nhiệt tình, 
                                            uy tín được đặt lên hàng đầu.</a></li>
                            <li><a href="{{route('cartt.index')}}">Đặt hàng tại đây</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Chính sách</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Chính sách vận chuyển</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Chính sách thanh toán</a></li>
                            <li><a href="#">Chính sách đổi trả hoàn tiền</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Liên Hệ</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Cửa hàng bán mô hình đồ chơi Gundam</a></li>
                            <li><a href="#">Địa chỉ: 20 Nguyễn Bính, Phường Xuân Phú, thành phố Huế</a></li>
                            <li><a href="#">Số điện thoại: 0335777138</a></li>
                            <li><a href="#">Email: gundam@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>GunDam</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i
                                    class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Chào mừng bạn đến với cửa hàng <br /> bán mô hình đồ chơi Gundam trực tuyến</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2021 Gundam Inc. All rights reserved.</p>
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
<script src="js/main.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/back-to-top.js"></script>

@stack('qty')
@include('page.partials.footer_ajax')

</body>

</html>