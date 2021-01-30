<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetNotificationController extends Controller
{
    public function cet_notification_events() {
        return view('user.cet-notification.cet-notification-events');
    }

    public function cet_notification_events_details($id) {
        return view('user.cet-notification.cet-notification-events-details');
    }

    public function cet_notification_exams() {
        $exams = DB::table('cet_kythi')->simplePaginate(5);
        return view('user.cet-notification.cet-notification-exams',[
            'exams' => $exams]);
    }

    public function cet_notification_exam_detail($Makythi) {
        $exam_detail = DB::table('cet_kythi')
        ->where('cet_kythi.MaKythi',$Makythi)
        ->distinct()
        ->get();
        $exam_detail_cathi = DB::table('cet_kythi')
        ->join('cet_kythi_cathi','cet_kythi.MaKythi','=','cet_kythi_cathi.MaKythi')
        ->where('cet_kythi.MaKythi',$Makythi)
        ->distinct()
        ->get();
        $exam_detail_diadiem = DB::table('cet_kythi')
        ->join('cet_kythi_diadiem','cet_kythi.MaKythi','=','cet_kythi_diadiem.Makythi')
        ->where('cet_kythi.MaKythi',$Makythi)
        ->distinct()
        ->get();
        $exam_detail_monthi = DB::table('cet_kythi')
        ->join('cet_kythi_monthi','cet_kythi.MaKythi','=','cet_kythi_monthi.MaKythi')
        ->where('cet_kythi.MaKythi',$Makythi)
        ->distinct()
        ->get();
        return view('user.cet-notification.cet-notification-exams-details',[
            'exam_detail' => $exam_detail,
            'exam_detail_cathi' => $exam_detail_cathi,
            'exam_detail_diadiem' => $exam_detail_diadiem,
            'exam_detail_monthi' => $exam_detail_monthi]
        );
    }
}
