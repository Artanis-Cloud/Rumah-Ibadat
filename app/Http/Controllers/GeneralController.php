<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class GeneralController extends Controller
{
    public function update_password(Request $request){
        // dd($request->all());
        $user = User::findOrFail(Auth::user()->id);

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error", "Kata laluan terdahulu tidak sama.");
        }

        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "Kata laluan terdahulu tidak boleh sama dengan kata laluan sekarang.");
            //dd('password lama sama dgn pass baru');
        }

        if (strcmp($request->get('password'), $request->get('password_confirmation')) == 1) {
            return redirect()->back()->with("error", "Kata laluan baru tidak sama.");
            //dd('password baru tak sama');
        }

        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $hashed_random_password = Hash::make($request->get('password'));

        $user->password = $hashed_random_password;

        $user->save();

        return redirect()->route('tukar-kata-laluan')->with("success", "Kata laluan telah ditukar.");
    }
}
