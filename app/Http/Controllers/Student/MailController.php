<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{

	public function string_random($length) {
    	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

    public function sendEmail(Request $request) {
        $verify_code = $this->string_random(60);
        $user = new User();
        $user->Hoten = $request->name;
        $user->tendangnhap = $request->username;
        $user->Email = $request->Email;
        $user->password = bcrypt($request->password);
        $user->verify = $verify_code;
        $user->save();
        $details = [
            'password' => $request->password,
            'verify_code' => $verify_code
        ];

        Mail::to($user->Email)->send(new SendEmail($details));
        return redirect()->route('login')->with('success','Đăng ký thành công,hãy kiểm tra email của bạn.');
    }

    public function verifyUser(Request $request) {
    	$verify_code = \Illuminate\Support\Facades\Request::get('code');
    	$user = DB::table('cet_student_acc')->where('verify',$verify_code)->first();
    	if($user!=null && $user->Trangthai!=1) {
    		DB::select('update cet_student_acc set Trangthai = "1" where verify = "$verify_code"');
    		return redirect()->route('login')->with('success','Bạn đã xác thực thành công.');
    	}
    	else {
    		return redirect()->route('login')->with('error','Đã xảy ra lỗi gì đó.');
    	}
    }
}
