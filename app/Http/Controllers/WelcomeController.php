<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // landing page
    public function welcome()
    {
        return view('welcome');
    }
}
