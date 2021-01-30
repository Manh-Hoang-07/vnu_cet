<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('user.auth.login');
    }

    public function login( Request $request)
    {
        $credentials = $request->only(['Email', 'password']);
        if(auth()->attempt($credentials))
        {
            if(Auth::user()->Trangthai == 1) {
                return redirect()->route('home')->with('success','Đăng nhập thành công.');
            } else {
                return redirect()->route('login')->with('error','Tài khoản chưa được xác nhận.');
            }
        }
        else if(Auth::guard('admin')->attempt($credentials))
        {
            return redirect()->route('admin.home')->with('success','Đăng nhập thành công.');
        }
        else 
        {
            return redirect()->route('login')
                ->with('error','Tài khoản hoặc mật khẩu không chính xác.');
        }
    }

    public function register() {
        return view('user.auth.register');
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function logout_admin()
    {
        auth()->guard()->logout();
        return redirect()->route('home');
    }
}
