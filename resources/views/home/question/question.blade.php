@extends('dashboard')
@section('content')

<section class="deal-of-week spad" style="background-color: white;">
    <div class="container">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <h2>Diễn đàn trao đổi</h2>
            </div>

            <table class="table">
                <tr class="badge-light">
                    <th width="60%">Câu hỏi</th>
                    <th>Lượt tương tác</th>
                    <th>Thời gian</th>
                </tr>
                @foreach($questions as $question)
                <tr>
                    <td>
                        <div>
                            <a href="/question-detail/{{$question->id}}" style="color: black">{{$question->content}}</a>
                        </div>
                        <div class="date">
                            Đăng bởi: {{\App\Models\User::find($question->user_id)->Hoten}}
                        </div>
                    </td>
                    <td>1234</td>
                    <td>{{$question->created_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection