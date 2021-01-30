@extends('dashboard')
@section('content')

<!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{asset('images/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Welcome to CET</h1>
                            <p>Chào mừng bạn đến với trang khảo thí Đại học Quốc gia Hà Nội</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{asset('images/hero-2.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1>Welcome to CET</h1>
                            <p>Chào mừng bạn đến với trang khảo thí Đại học Quốc gia Hà Nội</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<!-- Women Banner Section Begin -->
    <section class="women-banner spad" style="background-color: white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Các sự kiện nổi bật</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/women-1.jpg" alt="">
                                <div class="sale">New</div>
                            </div>
                            <div class="pi-text">
                                <a href="#">
                                    <h5>Tiêu đề 1</h5>
                                </a>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/women-2.jpg" alt="">
                                <div class="sale">New</div>
                            </div>
                            <div class="pi-text">
                                <a href="#">
                                    <h5>Tiêu đề 2</h5>
                                </a>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/women-3.jpg" alt="">
                                <div class="sale">New</div>
                            </div>
                            <div class="pi-text">
                                <a href="#">
                                    <h5>Tiêu đề 3</h5>
                                </a>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/women-4.jpg" alt="">
                                <div class="sale">New</div>
                            </div>
                            <div class="pi-text">
                                <a href="#">
                                    <h5>Tiêu đề 4</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week spad" style="background-color: white;">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2>Chức năng nhiệm vụ</h2>
                </div>
                
                <div>
                     @foreach($infomation_cocau as $infomation_cocau_value)
                    <?php 
                    echo $infomation_cocau_value->content2;
                    ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Tin tức nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="images/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    20/1/2020
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Tiêu đề 1</h4>
                            </a>
                            <p>Nội dung 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="images/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    20/1/2020
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Tiêu đề 2</h4>
                            </a>
                            <p>Nội dung 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="images/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    20/1/2020
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Tiêu đề 3</h4>
                            </a>
                            <p>Nội dung 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection