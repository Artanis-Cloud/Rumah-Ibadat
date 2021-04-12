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

        //fetch user's rumah ibadat
        $rumah_ibadat = RumahIbadat::where('user_id', auth()->user()->id)->first();
        
        //unique validator for name
        if($request->name != $rumah_ibadat->name){ //cheking either rumah ibadat name has been changed or not 

            //checking rumah ibadat name either been registered or not
            $checkName = RumahIbadat::where('name', $request->name)->count();

            if($checkName > 0){ //if the name exist, return back and display error message
                return redirect()->back()->with('error', 'Nama Rumah Ibadat ini telah didaftar.');
            }

        }

        //unique validator for ROS number
        if ($request->ros_number != $rumah_ibadat->ros_number) { //cheking either ros number has been changed or not 

            //checking ros number either been registered or not
            $checkRosNumber = RumahIbadat::where('ros_number', $request->ros_number)->count();

            if ($checkRosNumber > 0) { //if the ros number exist, return back and display error message
                return redirect()->back()->with('error', 'Nombor ROS ini telah didaftar.');
            }
        }

        //unique validator for account number
        if ($request->bank_account != $rumah_ibadat->bank_account) { //cheking either account number has been changed or not 

            //checking account number either been registered or not
            $checkAccountNumber = RumahIbadat::where('bank_account', $request->bank_account)->count();

            if ($checkAccountNumber > 0) { //if the ros number exist, return back and display error message
                return redirect()->back()->with('error', 'Nombor akaun ini telah didaftar.');
            }
        }

        //update validator
        $this->validatorUpdate($request->all())->validate();

        //update information
        $rumah_ibadat->category = $request->category;
        $rumah_ibadat->name = $request->name;
        $rumah_ibadat->ros_number = $request->ros_number;
        $rumah_ibadat->office_phone = $request->office_phone;
        $rumah_ibadat->address = $request->address;
        $rumah_ibadat->postcode = $request->postcode;
        $rumah_ibadat->district = $request->district;
        $rumah_ibadat->state = $request->state;
        $rumah_ibadat->bank_name = $request->bank_name;
        $rumah_ibadat->bank_account = $request->bank_account;

        //save information
        $rumah_ibadat->save();

        //redirect to 
        return redirect()->route('users.rumah-ibadat.kemaskini')->with('success', 'Maklumat rumah ibadat berjaya dikemaskini.');
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'category' => ['required', 'string'],
            'office_phone' => ['required', 'string', 'max:11', 'min:10'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:5', 'min:5'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
        ]);
    }

    public function menukar_rumah_ibadat()
    {
        return view('users.rumah-ibadat.menukar');

    }

}
