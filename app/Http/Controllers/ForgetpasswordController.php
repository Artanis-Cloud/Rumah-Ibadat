<?php

namespace App\Http\Controllers;

use App\Mail\CustomForgetPassword\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ForgetpasswordController extends Controller
{
    public function forgetPasswordPage(){
        return view('custom-forget-password.email');
    }

    public function sendEmail(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user == null){
            return redirect()->back()->with('error', 'Email ini tidak berdaftar dalam sistem ini.');
        }

        $password_reset = PasswordReset::create([
            'email' => $request->email,
            'token' => $request->_token,
        ]);

        //sent email

        Mail::send(new ResetPasswordMail($user));

        return redirect()->route('login')->with('success', 'Sistem telah menghantar pautan tetapan semula kata laluan anda melalui emel!');
    }

    public function customChangePassword(Request $request){

        if($request->password != $request->password_confirmation){
            return redirect()->back()->with('error', 'Kata laluan pengesahan tidak sama.');
        }

        if(strlen($request->password) < 8){
            return redirect()->back()->with('error', 'Kata laluan perlu mempunyai 8 huruf atau lebih.');
        }

        //save password
        $hashed_password = Hash::make($request->password);

        $user = User::where('ic_number', $request->ic_number)->first();

        $user->password = $hashed_password;

        $user->save();

        //delete token from password reset
        $delete_token = PasswordReset::where('token', $request->token)->delete();

        return redirect()->route('login')->with('success', 'Kata laluan baru telah dikemaskini.');
    }
}
