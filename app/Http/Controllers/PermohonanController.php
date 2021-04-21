<?php

namespace App\Http\Controllers;

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
}
