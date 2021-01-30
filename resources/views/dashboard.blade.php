<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang khảo thí Đại học Quốc gia Hà Nội</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="{{asset('css/fontawesome/css/all.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/libs3/themify-icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/elegant-icons.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/owl.carousel.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/nice-select.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/jquery-ui.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/slicknav.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/libs3/style.css')}}" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        trungtamkhaothi@vnu.edu.vn
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        (+84) – 24.66759258  /  (+84) – 24.62532740
                    </div>
                </div>
                <div class="topbar-divider d-none d-sm-block"></div>
                <div class="ht-right">
                	@if(Auth::check())
                    <li class="nav-item dropdown no-arrow" style="background-color: #f2f2f2;">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="{{ asset('images/1.png') }}" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline" style="color: #007f49;">{{Illuminate\Support\Facades\Auth::user()->Hoten}}</span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                          Thông tin tài khoản
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                          Đổi mật khẩu<u></u>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Bạn chắc chắn muốn đăng xuất?')">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Đăng xuất
                        </a>
                      </div>
                    </li>
                    @else
                    <a href="/login" class="login-panel"><i class="fa fa-user"></i>Đăng nhập  </a>
                    <a href="/register" class="login-panel" style="margin-right:10px;"><i class="fa fa-user"></i>Đăng ký  </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <a href="/cetinfo">
                            <img src="{{asset('images/images/logo.png')}}" alt="" width="70" height="70">
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <div class="input-group">
                                <input type="text" placeholder="Từ khóa cần tìm" style="border:1px solid #f2f2f2;border-radius: 10px;">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i> Lịch sử
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="/cet-home">Trang chủ</a>
                        	<ul class="dropdown">
                                <li><a href="/cet-infomation-cocau">Cơ cấu tổ chức</a></li>
                                <li><a href="/cet-infomation-chucnang">Chức năng và nhiệm vụ</a></li>
                            </ul>
                        </li>
                        <li><a href="">Tin tức</a>
                            <ul class="dropdown">
                                <li><a href="/cet-notification-events">Các sự kiện</a></li>
                                <li><a href="/cet-notification-exams">Các kỳ thi</a></li>
                            </ul>
                        </li>
                        <li><a href="">Đăng ký thi</a></li>
                        <li><a href="">Diễn đàn trao đổi</a>
                             <ul class="dropdown">
                                <li><a href="/home/question">Trao đổi chung</a></li>
                                <li><a href="/student/my/question">Trao đổi riêng</a></li>
                            </ul>
                        </li>
                        <li><a href="/student/messengers">Tin nhắn</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
        	<div class="row">
                <div class="col-lg-12">
	                <div class="section-title">
		                <h2 style="color: white;">Các đối tác</h2>
		            </div>
		        </div>

            </div>
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
	                    <img src="{{('/images/doitac/uet_logo.png')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/DHKHTN_logo.png')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/ussh_logo.png')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/ulis.png')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/dhkt.jpg')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/khoa_luat.jpg')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/dhtnmt.png')}}" alt="" />
	                </div>
                </div>

                <div class="logo-item">
                    <div class="tablecell-inner">
	                     <img src="{{('/images/doitac/dhvinh.jpg')}}" alt="" />
	                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('images/footer-logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ:</li>
                            <li>Số điện thoại:</li>
                            <li>Email:</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Dịch vụ</h5>
                        <ul>
                            <li><a href="#">Dịch vụ 1</a></li>
                            <li><a href="#">Dịch vụ 2</a></li>
                            <li><a href="#">Dịch vụ 3</a></li>
                            <li><a href="#">Dịch vụ 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Chính sách</h5>
                        <ul>
                            <li><a href="#">Chính sách 1</a></li>
                            <li><a href="#">Chính sách 2</a></li>
                            <li><a href="#">Chính sách 3</a></li>
                            <li><a href="#">Chính sách 4</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Cần tư vấn</h5>
                        <p>Hãy để lại địa chỉ email của bạn</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập email của bạn.">
                            <button type="button">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright
                        </div>
                        <div class="payment-pic">
                            <img src="{{asset('images/payment-method.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <ul class="giuseart-pc-contact-bar">
        <li class="facebook">
            <a href="" target="_blank" rel="nofollow"></a>
        </li>
        <li class="zalo">
            <a href="" target="_blank" rel="nofollow"></a>
        </li>
    </ul>
     
    <ul class="giuseart-mobile-contact-bar">
        <li class="facebook">
            <a href="" target="_blank" rel="nofollow"></a>
        </li>
        <li class="zalo">
            <a href="" target="_blank" rel="nofollow"></a>
        </li>
        <li class="hotline">
            <a href="" target="_blank" rel="nofollow"></a>
        </li>
    </ul>

    <!-- Js Plugins -->
    <script src="{{asset('js/libs3/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.dd.min.js')}}"></script>
    <script src="{{asset('js/libs3/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/libs3/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/libs3/main.js')}}"></script>
    <script src="{{asset('js/libs3/chatmessenger.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('script')

    @if(Session::has('success'))
        <script type="text/javascript">
            toastr.success("{!!Session::get('success')!!}");
        </script>
    @endif
</body>

</html>
