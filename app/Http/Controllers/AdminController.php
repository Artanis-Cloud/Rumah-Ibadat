<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function pengguna()
    {
        return view('admins.pengguna.pilih');
    }

    public function pemohon()
    {
        //get user that can apply rumah ibadat
        $pengguna = User::where('role', '0')->get();

        return view('admins.pengguna.pemohon', compact('pengguna'));
    }

    public function pengguna_dalaman()
    {
        //get user that canot apply rumah ibadat
        $pengguna = User::where('role' , '!=', '0')->get();

        return view('admins.pengguna.pengguna-dalaman', compact('pengguna'));
    }
}
