<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\RumahIbadat;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

class RumahIbadatController extends Controller
{
    public function pilih_rumah_ibadat()
    {
        return view('users.rumah-ibadat.pilih');
    }

    public function daftar_rumah_ibadat()
    {
        return view('users.rumah-ibadat.daftar');
    }

    public function menukar_rumah_ibadat()
    {
        return view('users.rumah-ibadat.menukar');

    }

    public function tambah_rumah_ibadat(Request $request)
    {
        // validate rumah ibadat registration
        $this->validator($request->all())->validate();

        //fetch current user details
        $user = User::findorfail(auth()->user()->id);

        //register rumah ibadat
        $rumah_ibadat = RumahIbadat::create([
            'category' => $request->category,
            'name' => $request->name,
            'ros_number' => $request->ros_number,
            'office_phone' => $request->office_phone,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'district' => $request->district,
            'state' => $request->state,
            'bank_name' => $request->bank_name,
            'bank_account' => $request->bank_account,
            'user_id' => $user->id,
        ]);

        //update user status
        $user->is_firstime = "0";
        $user->is_rumah_ibadat = "1";
        $user->update();

        return redirect()->route('users.rumah-ibadat.kemaskini')->with('success', 'Rumah Ibadat berjaya didaftar.');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'category' => ['required','string'],
            'name' => ['required', 'string','max:255', 'unique:rumah_ibadats'],
            'ros_number' => ['required', 'string', 'unique:rumah_ibadats'],
            'office_phone' => ['required', 'string', 'max:11', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:5', 'min:5'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
            'bank_account' => ['required', 'string', 'unique:rumah_ibadats'],
        ]);
    }

    public function profil_rumah_ibadat()
    {
        //fetch user's rumah ibadat
        $rumah_ibadat = RumahIbadat::where('user_id', auth()->user()->id)->first();

        return view('users.rumah-ibadat.kemaskini', compact('rumah_ibadat'));
    }


    public function update_rumah_ibadat(Request $request){
        // dd($request->all());

        //unique validator

        return redirect()->back()->withInput();

    }

}
