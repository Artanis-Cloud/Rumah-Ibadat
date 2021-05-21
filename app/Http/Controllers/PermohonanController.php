<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\RumahIbadat;

use Illuminate\Http\Request;

class PermohonanController extends Controller
{

    public function pilih_permohonan()
    {
        return view('users.permohonan.pilih');
    }

    public function permohonan_baru()
    {   
        $user_id = auth()->user()->id;
        $rumah_ibadat = RumahIbadat::where('user_id', $user_id )->get()->first();

        $rumah_ibadat_checker = RumahIbadat::where('user_id', $user_id)->count();

        if($rumah_ibadat_checker == 0){
            return redirect()->back()->with('error', 'Sila daftar rumah ibadat untuk membuat permohonan');
        }
        return view('users.permohonan.baru', compact('rumah_ibadat'));
    }

    public function permohonan_hantar(Request $request){
        dd($request->all());
    }

    public function permohonan_khas()
    {
        return view('users.permohonan.khas');
    }

    public function permohonan_proses()
    {
        return view('users.permohonan.proses');
    }

    public function permohonan_lulus()
    {
        return view('users.permohonan.lulus');
    }

    public function permohonan_gagal()
    {
        return view('users.permohonan.gagal');
    }
}
