<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class ExcoController extends Controller
{
    public function dashboard()
    {
        return view('excos.dashboard');
    }

    public function permohonan()
    {
        return view('excos.permohonan.pilih');
    }

    public function permohonan_baru()
    {
        return view('excos.permohonan.baru');
    }

    public function papar_permohonan()
    {
        return view('excos.permohonan.papar');
    }
}
