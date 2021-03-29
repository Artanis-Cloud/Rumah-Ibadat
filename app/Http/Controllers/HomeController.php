<?php

namespace App\Http\Controllers;

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
    public function index_user()
    {
        // return view('users.halaman-utama');
        return view('users.dashboard');

    }

    public function index_admin()
    {
        return view('admins.halaman-utama');
    }

    public function index_super_admin()
    {
        return view('super-admins.halaman-utama');
    }
}
