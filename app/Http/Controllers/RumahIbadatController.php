<?php

namespace App\Http\Controllers;

use Toastr;
use Auth;

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
        //check if user has register rumah ibadat
        if(auth()->user()->is_rumah_ibadat == 1){
            return redirect()->back()->with('error', 'Anda telah mendaftar rumah ibadat');
        }

        return view('users.rumah-ibadat.daftar');
    }

    public function menukar_rumah_ibadat()
    {
        //check if user has register rumah ibadat
        if (auth()->user()->is_rumah_ibadat == 1) {
            return redirect()->back()->with('error', 'Anda telah mendaftar rumah ibadat');
        }

        return view('users.rumah-ibadat.menukar');
    }

    public function tambah_rumah_ibadat(Request $request)
    {   
        // validate rumah ibadat registration
        $this->validator($request->all())->validate();

        //validate the main registration_id
        if($request->category != "GEREJA" && $request->registration_type == "INDUK"){
            $this->validatorNonGereja($request->all())->validate();
        }

        //fetch current user details
        $user = User::findorfail(auth()->user()->id);

        //register rumah ibadat
        $rumah_ibadat = RumahIbadat::create([
            'category' => $request->category,
            'name_association' => $request->name_association,
            'office_phone' => $request->office_phone,
            'name_association_bank' => $request->name_association_bank,
            'registration_type' => $request->registration_type,
            'name_association_main' => $request->name_association_main,
            'registration_number' => $request->registration_number,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'district' => $request->district,
            'state' => $request->state,
            'pbt_area' => $request->pbt_area,
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
            'name_association' => ['required', 'string','max:255', 'unique:rumah_ibadats'],
            'office_phone' => ['nullable', 'string', 'min:10', 'max:11'],
            'name_association_bank' => ['required', 'string', 'max:255'],
            'registration_type' => ['required'],
            'registration_number' => ['required', 'string', 'unique:rumah_ibadats'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:5', 'min:5'],
            'district' => ['required', 'string', 'max:255'],
            'pbt_area' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string'],
            'bank_account' => ['required', 'string', 'unique:rumah_ibadats'],
        ]);
    }

    protected function validatorNonGereja(array $data)
    {
        return Validator::make($data, [
            'registration_number_main' => ['required', 'string', 'max:255'],
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

        //unique validator for registration number
        if ($request->registration_number != $rumah_ibadat->registration_number) { //cheking either ros number has been changed or not

            //checking registration number either been registered or not
            $checkRegistraionNumber = RumahIbadat::where('registration_number', $request->registration_number)->count();

            if ($checkRegistraionNumber > 0) { //if the ros number exist, return back and display error message
                return redirect()->back()->with('error', 'Nombor pendaftaran ini telah didaftar.');
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
        $rumah_ibadat->office_phone = $request->office_phone;
        $rumah_ibadat->registration_type = $request->registration_type;
        $rumah_ibadat->registration_number = $request->registration_number;
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
            'name' => ['required', 'string', 'max:255'],
            'office_phone' => ['nullable', 'string', 'min:10', 'max:11'],
            'registration_type' => ['required'],
            'registration_number' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:5', 'min:5'],
            'district' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string'],
            'bank_account' => ['required', 'string'],
        ]);
    }

}
