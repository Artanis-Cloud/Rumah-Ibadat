<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
