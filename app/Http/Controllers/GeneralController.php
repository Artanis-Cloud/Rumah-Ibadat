<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function update_password(Request $request){

        // Validate change password form
        $this->validator($request->all())->validate();

        $user = User::findOrFail(Auth::user()->id);

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Kata laluan terdahulu tidak sama.");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "Kata laluan terdahulu tidak boleh sama dengan kata laluan sekarang.");
        }

        if (strcmp($request->get('password'), $request->get('password_confirmation')) == 1) {
            return redirect()->back()->with("error", "Kata laluan baru tidak sama.");
        }


        $hashed_random_password = Hash::make($request->get('password'));

        $user->password = $hashed_random_password;

        $user->save();

        return redirect()->route('tukar-kata-laluan')->with("success", "Kata laluan telah ditukar.");
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ]);
    }
}
