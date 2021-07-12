<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function pengguna()
    {
        return view('admins.pengguna.pilih');
    }

    public function pemohon()
    {
        //get user that can apply rumah ibadat
        $pengguna = User::where('role', '0')->get();

        return view('admins.pengguna.pemohon', compact('pengguna'));
    }

    public function pemohon_change_status(Request $request){

        if($request->has('user_id_disable')){
            $user_id = $request->user_id_disable;
        }else{
            $user_id = $request->user_id_enable;
        }

        $user = User::findorfail($user_id);

        if($user->status == 0){
            $user->status = 1;
            $user->save();
            return redirect()->route('admins.pengguna.pemohon')->with('success', 'Pengguna telah diaktifkan.');
        }else{
            $user->status = 0;
            $user->save();
            return redirect()->route('admins.pengguna.pemohon')->with('success', 'Pengguna telah dinyaktif.');
        }
    }

    public function pengguna_dalaman()
    {
        //get user that canot apply rumah ibadat
        $pengguna = User::where('role' , '!=', '0')->get();

        return view('admins.pengguna.pengguna-dalaman', compact('pengguna'));
    }

    public function audit_trail_process(){
        // dd("papar audit trail proses");

        $audit_process = Audit::where('event', '!=', 'Log Masuk')->where('event', '!=', 'Log Keluar')->get();

        return view('admins.audit-trail.proses', compact('audit_process'));
    }

    public function audit_trail_log_user(){
        $audit_log_user = Audit::where('event', 'Log Masuk')->orWhere('event', 'Log Keluar')->get();


        return view('admins.audit-trail.log-user', compact('audit_log_user'));
    }
}
