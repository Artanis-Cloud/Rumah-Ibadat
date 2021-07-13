<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
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
        $pengguna = User::where('role', '!=', '0')->get();

        return view('admins.pengguna.pengguna-dalaman', compact('pengguna'));
    }

    public function pengguna_dalaman_change_status(Request $request){
        // dd($request->all());
        if ($request->has('user_id_disable')) {
            $user_id = $request->user_id_disable;
        } else {
            $user_id = $request->user_id_enable;
        }

        $user = User::findorfail($user_id);

        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna telah diaktifkan.');
        } else {
            $user->status = 0;
            $user->save();
            return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna telah dinyaktif.');
        }
    }

    public function pengguna_dalaman_daftar()
    {

        return view('admins.pengguna.daftar');
    }

    public function pengguna_dalaman_daftar_submit(Request $request){
        // dd($request->all());

        //check ic
        $ic_checker = User::where('ic_number', $request->ic_number)->count();

        if($ic_checker > 0){
            return redirect()->back()->with('error', 'Kad pengenalan telah didaftarkan.');
        }

        $hashed_random_password = Hash::make("1234567890");

        $user = User::create([
            'role' => $request->role,
            'status' => "1",
            'is_firstime' => "1",
            'is_rumah_ibadat' => "0",
            'name' => $request->name,
            'email' => $request->email,
            'ic_number' => $request->ic_number,
            'mobile_phone' => $request->phone,
            'password' => $hashed_random_password,

        ]);

        if($request->role == 1 || $request->role == 2){
            $checking_user_role = UserRole::where('user_id', $user->id)->count();

            $tokong = 0;
            $kuil = 0;
            $gurdwara = 0;
            $gereja = 0;

            foreach($request->rumah_ibadat as $data){
                if($data == "tokong"){
                    $tokong = 1;
                }

                if ($data == "kuil") {
                    $kuil = 1;
                }

                if ($data == "gurdwara") {
                    $gurdwara = 1;
                }

                if ($data == "gereja") {
                    $gereja = 1;
                }
            }


            if($checking_user_role == 0){ //create new user_role

                $user = UserRole::create([
                    'user_id' => $user->id,

                    'tokong' => $tokong,
                    'kuil' => $kuil,
                    'gurdwara' => $gurdwara,
                    'gereja' => $gereja,
                ]);
            }

        }

        return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna berjaya didaftar.');
    }

    public function kemaskini_maklumat(Request $request){

        $user = User::findorfail($request->user_id);

        return view('admins.pengguna.kemaskini-dalaman', compact('user'));
    }

    public function kemaskini_maklumat_update(Request $request){
        // dd($request->all());

        $user = User::findorfail($request->user_id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->ic_number = $request->ic_number;

        $user->mobile_phone = $request->phone;

        $user->role = $request->role;

        $user->save();

        if ($request->role == 1 || $request->role == 2) {
            $checking_user_role = UserRole::where('user_id', $user->id)->count();

            $tokong = 0;
            $kuil = 0;
            $gurdwara = 0;
            $gereja = 0;

            foreach ($request->rumah_ibadat as $data) {
                if ($data == "tokong") {
                    $tokong = 1;
                }

                if ($data == "kuil") {
                    $kuil = 1;
                }

                if ($data == "gurdwara") {
                    $gurdwara = 1;
                }

                if ($data == "gereja") {
                    $gereja = 1;
                }
            }


            if ($checking_user_role == 0) { //create new user_role

                $user = UserRole::create([
                    'user_id' => $user->id,

                    'tokong' => $tokong,
                    'kuil' => $kuil,
                    'gurdwara' => $gurdwara,
                    'gereja' => $gereja,
                ]);
            }else{
                $user_role = UserRole::where('user_id', $user->id)->first();

                $user_role->tokong = $tokong;
                $user_role->kuil = $kuil;
                $user_role->gurdwara = $gurdwara;
                $user_role->gereja = $gereja;

                $user_role->save();
            }
        }

        return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Maklumat pengguna telah dikemaskini.');
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
