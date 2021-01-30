@extends('dashboard')
@section('content')
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Thông tin chi tiết</h2>
                </div>
            </div>
        </div>
        
        <div class="row" style="background-color: white;">
            <div class="col-lg-8 col-md-8">
                
                <div class="" style="margin:5px;padding: 5px;">
                    <div class="" style="margin:5px;padding: 5px;">
                        <div class="single-latest-blog col-lg-12" style="display: inline-block;">
                            <div class="col-lg-12 col-md-12">
                                <h4>Thời gian:
                                    @foreach($exam_detail_cathi as $detail)
                                        Ca {{$detail->Cathi}}({{$detail->Giothi}})
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider badge-light">
                <div class="" style="margin:5px;padding: 5px;">
                    <div class="" style="margin:5px;padding: 5px;">
                        <div class="single-latest-blog col-lg-12" style="display: inline-block;">
                            <div class="col-lg-12 col-md-12">
                                <h4>Địa điểm:
                                    @foreach($exam_detail_diadiem as $detail)
                                        {{$detail->Madiadiem}}
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider badge-light">
                <div class="" style="margin:5px;padding: 5px;">
                    <div class="" style="margin:5px;padding: 5px;">
                        <div class="single-latest-blog col-lg-12" style="display: inline-block;">
                            <div class="col-lg-12 col-md-12">
                                <h4>Mô tả:
                                    @foreach($exam_detail as $detail)
                                        {{$detail->Mota}}
                                    @endforeach
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="sidebar-divider badge-light">
                <div class="" style="margin:5px;padding: 5px;">
                    <div class="" style="margin:5px;padding: 5px;">
                        <div class="single-latest-blog col-lg-12" style="display: inline-block;">
                            <div class="col-lg-12 col-md-12">
                                <table class="table">
                                    <tr>
                                        <th>Mã môn thi</th>
                                        <th>Giờ thi</th>
                                        <th>Ngày thi</th>
                                        <th>Địa điểm thi</th>
                                        <th>Lệ phí thi</th>
                                        <th>Thời gian làm bài</th>
                                    </tr>
                                    @foreach($exam_detail_monthi as $detail)
                                        <tr>
                                            <td>{{$detail->MaMonthi}}</td>
                                            <td>{{$detail->Giothi}}</td>
                                            <td>{{$detail->Ngaythi}}</td>
                                            <td>{{$detail->Diaidiemthi}}</td>
                                            <td>{{$detail->Lephithi}}</td>
                                            <td>{{$detail->Thoigianlambai}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="filter-control" style="margin-bottom: 0px;padding-top: 5px;">
                    <ul>
                        <li class="active">Các kỳ thi khác</li>
                    </ul>
                </div>
                <hr class="sidebar-divider badge-light">
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection