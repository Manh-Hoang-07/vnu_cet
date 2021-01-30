@extends('dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xl-12 chat-messenger">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="{{asset('/images/1.png')}}">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>Chat with Khalid</span>
                                <p>1767 Messages</p>
                            </div>
                        </div>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        @foreach($messengers as $messenger)
                            @if(\App\Models\User::find($messenger->user_id_from)->role == 'user')
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{asset('/images/1.png')}}" class="rounded-circle user_img_msg">
                                    </div>
                                    <div class="msg_cotainer">
                                    {{$messenger->content}}
                                    <!-- <span class="msg_time">{{$messenger->created_at}}</span> -->
                                    </div>
                                </div>
                            @endif
                            @if(\App\Models\User::find($messenger->user_id_from)->role == 'admin')
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                    {{$messenger->content}}
                                    <!-- <span class="msg_time_send">{{$messenger->created_at}}</span> -->
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="{{asset('/images/1.png')}}" class="rounded-circle user_img_msg">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <form id="Form-data">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip" style="color: gray;"></i></span>
                                </div>
                                <textarea name="messenger" class="form-control type_msg" placeholder="Nhập tin nhắn..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn" style="background-color: #ccc;"><button id="submit" type="submit">gửi</button></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#submit').click(function (e) {
                e.preventDefault();
                let idUser =$(this).data('id');
                $.ajax({
                    type:"POST",
                    url:"/admin/reply/messenger/"+idUser,
                    data:$('#Form-data').serialize(),
                });
            });
        });

        $(document).ready(function(){
            $('#action_menu_btn').click(function(){
                $('.action_menu').toggle();
            });
        });
    </script>
@endsection
