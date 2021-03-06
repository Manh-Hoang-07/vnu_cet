<head>
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs3/login.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('images/logo.png')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form id="loginform" action="{{route('login')}}"  method="post">
                        @csrf
                        <center>
                          <div class="mb-3">
                            <div class="">
                              <h2 style="font-size: 30px;color:#007f49; ">TRANG ĐĂNG NHẬP</h2>
                            </div>
                          </div>
                        </center>
                        <div class="input-group mb-2">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

				            <input type="text" name="Email" id="Email" autocomplete="Email" class="form-control input_user" value="" placeholder="Tên đăng nhập">
                        </div>

                        <small><label id="Email-error" class="error" for="Email"></label></small>
                        
                        <div class="input-group mb-2">
                            <div class=" input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

				            <input type="password" name="password" id="password" autocomplete="current-password" class="form-control input_pass" value="" placeholder="Mật khẩu">
                        </div>

                        <small><label id="password-error" class="error" for="password"></label></small>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Nhớ mật khẩu</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="login" class="btn login_btn">Đăng nhập</button>
                        </div>
                    </form>
                </div>
        
                <div class="mt-2">
                    <div class="d-flex justify-content-center links">
                        Bạn chưa có tài khoản? <a href="{{route('register')}}" class="ml-2">Đăng ký</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="{{route('forgotpassword')}}">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if(Session::has('success'))
        <script type="text/javascript">
            toastr.success("{!!Session::get('success')!!}");
        </script>
    @endif
    @if(Session::has('error'))
        <script type="text/javascript">
            toastr.error("{!!Session::get('error')!!}");
        </script>
    @endif

    <script type="text/javascript" src="{{asset('js/libs3/validate/validate_login.js')}}">
      
    </script>
</body>
</html>
