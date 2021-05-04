<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index_user()
    {
        // dd( Auth::user()->name );
        // return view('users.halaman-utama-nicepage');
        return view('users.halaman-utama');
    }
    
    public function update_profile(Request $request){

        // Validate change password form
        // $this->validator($request->all())->validate();

        $user = User::findOrFail(Auth::user()->id);

        // dd($request->all());
        $user->name = $request->name;

        $user->email = $request->email;

        $user->ic_number = $request->ic_number;

        $user->mobile_phone = $request->mobile_phone;

        $user->save();

        return redirect()->back()->with("success", "Berjaya kemaskini profil.");
    }

    public function update_profile_pengguna()
    {
        // return redirect()->back()->withInput();
        $user = auth()->user();
        return view('users.kemaskini-profil', compact('user'));
    }
}
