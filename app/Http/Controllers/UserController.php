<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index_user()
    {
        // dd( Auth::user()->name );
        // return view('users.halaman-utama-nicepage');
        return view('users.halaman-utama');
    }

    public function update_profile_pengguna()
    {
        // return redirect()->back()->withInput();
        $user = auth()->user();
        return view('users.kemaskini-profil', compact('user'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'ic_number' => ['required', 'string', 'min:12', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_phone' => ['required', 'string', 'max:11', 'min:10'],
        ]);
    }
    
    public function update_profile(Request $request){
        // dd($request->all());
        

        // Validate change password form
        $this->validator($request->all())->validate();

        $user = User::findOrFail(Auth::user()->id);

        // dd($request->all());
        $user->name = $request->name;

        $user->email = $request->email;

        $user->ic_number = $request->ic_number;

        $user->mobile_phone = $request->mobile_phone;

        $user->save();

        return redirect()->back()->with("success", "Profil anda berjaya dikemaskini.");
    }

}
