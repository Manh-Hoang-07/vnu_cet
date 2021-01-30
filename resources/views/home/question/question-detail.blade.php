@extends('dashboard')
@section('content')
<style type="text/css">

.date-comment {
    font-size: 11px
}

.comment-text {
    font-size: 12px
}

.fs-12 {
    font-size: 12px
}

.shadow-none {
    box-shadow: none
}

.name {
    color: #007bff
}

.cursor:hover {
    color: blue
}

.cursor {
    cursor: pointer
}

.textarea {
    resize: none
}


.card-question {
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 15px !important;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-no-border {
    border: 0px;
    border-radius: 4px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.02);
    cursor: pointer
}

.comment-widgets .comment-row {
    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
    padding: 15px
}

.comment-text:hover {
    visibility: hidden
}

.comment-text:hover {
    visibility: visible
}

.label {
    padding: 3px 10px;
    line-height: 13px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 75%
}

.round img {
    border-radius: 100%
}

.label-info {
    background-color: #1976d2
}

.label-success {
    background-color: green
}

.label-danger {
    background-color: #ef5350
}

.action-icons a {
    padding-left: 7px;
    vertical-align: middle;
    color: #99abb4
}

.action-icons a:hover {
    color: #1976d2
}

</style>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                @foreach($question as $question)
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle" src="{{asset('/images/1.png')}}" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name">{{\App\Models\User::find($question->user_id)->Hoten}}</span>
                            <span class="date-comment text-black-50">{{$question->created_at}}</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="">{{$question->content}}</p>
                    </div>
                </div>
                @endforeach
                <div class="bg-white">
                    <div class="d-flex flex-row fs-12">
                        <div class="like p-2 cursor"><span class="ml-1">100 caau trar loiwf</span></div>
                    </div>
                </div>
                <div class="bg-light p-2">
                    <div class="d-flex flex-row align-items-start">
                        <textarea class="form-control ml-1 shadow-none textarea"></textarea>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-primary btn-sm shadow-none" type="button">Trả lời</button>
                    </div>
                </div>

                <div class="bg-white" style="padding: 10px;">    
                    <div class="card-question">
                        <div class="card-body">
                            <h4 class="card-title">Tất cả câu trả lời</h4>
                            <h6 class="card-subtitle">Trả lời mới nhất của người dùng</h6>
                        </div>
                        <hr class="sidebar-divider badge-light">
                        <div class="comment-widgets m-b-20">
                            @foreach($question_detail as $question_detail)
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <span class="round">
                                        <img src="https://i.imgur.com/uIgDDDd.jpg" alt="user" width="50">
                                    </span>
                                </div>
                                <div class="comment-text w-100">
                                    <h5>{{$question_detail->id}}</h5>
                                    <div class="comment-footer"> 
                                        <span class="date">{{$question_detail->created_at}}</span>  
                                    </div>
                                    <p class="m-b-5 m-t-10">{{$question_detail->content}}</p>
                                </div>
                            </div>
                            @endforeach  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="background-color: white;">
            <div class="filter-control" style="margin-bottom: 0px;padding-top: 5px;">
                <ul>
                    <li class="active">Các câu hỏi liên quan</li>
                </ul>
            </div>
            <hr class="sidebar-divider badge-light">
            <div></div>
        </div>

    </div>
</div>
@endsection