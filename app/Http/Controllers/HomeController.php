<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index_super_admin()
    {
        return view('super-admins.halaman-utama');
    }

    public function change_password()
    {
        $user = Auth::user();
        // dd($user);

        return view('tukar-kata-laluan', compact('user'));
    }
}
