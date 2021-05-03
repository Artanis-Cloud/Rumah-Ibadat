<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\RumahIbadat;

use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    
    public function permohonan_baru()
    {
        return view('users.permohonan.baru');
    }

    public function permohonan_hantar(Request $request){
        dd($request->all());
    }

    public function permohonan_khas()
    {
        return view('users.permohonan.khas');
    }
}
