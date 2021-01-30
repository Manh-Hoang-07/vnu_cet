@extends('dashboard')
@section('content')
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Thông tin các kỳ thi</h2>
                </div>
            </div>
        </div>
        
        <div class="row" style="background-color: white;">
            <div class="col-lg-12 col-md-12">
                @foreach($exams as $exam)
                <div class="" style="margin:5px;padding: 5px;border-bottom: 1px solid white;">
                    <div class="single-latest-blog col-lg-12" style="display: inline-block;">
                        <div class="col-lg-4 col-md-6" style="float: left;">
                            <img src="images/thong-bao.png" alt="">
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="latest-text">
                                <a href="/cet-notification-exam-detail/ma-ky-thi-{{$exam->MaKythi}}">
                                    <h4>{{$exam->TenKythi}} - {{$exam->MaKythi}}</h4>
                                </a>
                                <div class="tag-list">
                                    <div class="tag-item">
                                        <i class="fa fa-calendar-o"></i>
                                        Hạn đăng ký:{{$exam->Handangky}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div style="padding: 5px;margin:5px;">
        <center>{!! $exams->links() !!}</center>
    </div>
</section>
@endsection