<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UpenController extends Controller
{
    public function dashboard()
    {
        return view('upens.dashboard');
    }
}
