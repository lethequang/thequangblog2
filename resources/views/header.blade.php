<!DOCTYPE html>
<html>
<head>
    <title>Website bán sách trực tuyến - TheQuang.Blog</title>
    <base href="{{asset('')}}">
    <link href="source/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="source/js/jquery.min.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="source/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <link rel="shortcut icon" type="image/png" href="source/images/favicon.ico"/>
    <meta HTTP-EQUIV="Content-Language" CONTENT="vi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="bookstore,thequang.blog"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		} </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!--//slider-script-->
    <script type="text/javascript" src="source/js/move-top.js"></script>
    <script type="text/javascript" src="source/js/easing.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
			});
		});
    </script>
    <!-- start menu -->
    <link href="source/css/megamenu.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="source/js/megamenu.js"></script>
    <script>
		$(document).ready(function () {
			$(".megamenu").megamenu();
		});
    </script>

</head>
<body>
<!--header-->
<div class="container">
    <div class="header" id="home">
        <div class="header-para">
            <p><span></span></p>
        </div>
        <ul class="header-in">
            @if(Auth::check())
                <li>Chào:</li>
                <li><p>{{ Auth::user()->name .' '}}</p></li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#"> Hồ sơ</a></li>
                            <li><a href="{{ route('changepass') }}"> Đổi mật khẩu</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}"> Đăng xuất</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ route('contact') }}"> LIÊN HỆ</a></li>
            @else
                <li><a href="{{ route('register') }}"> ĐĂNG KÝ</a></li>
                <li><a href="{{ route('login') }}"> ĐĂNG NHẬP</a></li>
                <li><a href="{{ route('contact') }}"> LIÊN HỆ</a></li>
            @endif
        </ul>
        <div class="clearfix"></div>
    </div><!---->
    <div class="header-top">
        <div class="logo">
            <a href="#"><img src="source/images/logo-thequang3.png" alt="" style="width: 60%"></a>
        </div>
        <div class="header-top-on">
           <form action="{{ route('search') }}" method="get">
            <input type="text" class="search1" name="key" placeholder="Tìm kiếm..">
           </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="header-bottom">
        <div class="top-nav">
            <ul class="megamenu skyblue">
                <li class="active grid"><a href="{{ route('home') }}">TRANG CHỦ</a></li>
                <li class="grid"><a href="#">DANH MỤC</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col1">
                                <div class="h_nav">
                                    <ul>
                                        <li><a href="store.html">SÁCH NỔI BẬT</a></li>
                                        <li><a href="store.html">SÁCH MỚI NHẤT</a></li>
                                        <li><a href="store.html">SÁCH GIẢM GIÁ</a></li>
                                        <li><a href="store.html">SÁCH BÁN CHẠY</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a class="pink" href="{{ route('cart') }}">GIỎ HÀNG</a></li>
                <li><a class="pink" href="{{ route('news') }}">TIN TỨC</a></li>
            </ul>
        </div>
        <div class="cart icon1 sub-icon1">
            <h6>Giỏ Hàng: <span class="item"><span
                            id="tongsl">@if(count($cartItems)){{ count($cartItems) }}</span> sản phẩm @else
                        Trống @endif</span>
                @if(count($cartItems))
                    <span class="rate" value="{{ Cart::total() }}">{{ Cart::total() }} VNĐ</span>
                    <li><a href="{{ route('cart') }}" class="round"> </a>
                        <ul class="sub-icon1 list">
                            <h3></h3>
                            <div class="shopping_cart">
                                @foreach($cartItems as $item)
                                    <div class="hidecart cart_box" id="">
                                        <div class="message">
                                            <a value="" soluong=""
                                                    class="delheader alert-close"></a>
                                            <div class="list_img"><img src="images"
                                                        class="img-responsive" alt=""></div>
                                            <div class="list_desc"><h4><p class="textcut-overflow" href="book/{{ $item->slug }}">{{ $item->name }}</p>
                                                </h4>
                                                <h5>Số lượng: <span id="soluongsp">{{ $item->qty }}</span></h5>
                                                <h5>Đơn giá: <span id=""
                                                            value="">{{ number_format($item->price) }}</span>
                                                </h5>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="check_button"><a href="{{ route('cart') }}">Chi Tiết Giỏ Hàng</a></div>
                            <div class="clearfix"></div>
                        </ul>
                    </li>
                @endif
            </h6>

        </div>
        <div class="clearfix"></div>
    </div>

