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
}
