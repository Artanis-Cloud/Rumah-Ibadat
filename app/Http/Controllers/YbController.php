<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class YbController extends Controller
{
    public function dashboard()
    {
        return view('ybs.dashboard');
    }
}
