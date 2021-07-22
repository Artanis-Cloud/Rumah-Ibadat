<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\RumahIbadat;
use Illuminate\Http\Request;
use App\Models\User;


class WelcomeController extends Controller
{
    // landing page
    public function welcome()
    {
        $count_pemohon = User::where('role', '0')->count();

        $count_rumah_ibadat = RumahIbadat::count();

        $count_permohonan = Permohonan::count();

        // dd($count_pemohon);

        return view('welcome', compact('count_pemohon', 'count_rumah_ibadat', 'count_permohonan'));
    }
}
