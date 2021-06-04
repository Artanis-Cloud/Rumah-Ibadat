<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\User;

use Illuminate\Http\Request;

class ExcoController extends Controller
{
    public function dashboard()
    {
        $count_new_application = Permohonan::where('exco_id', null)->count();

        $count_processing_application = Permohonan::where('exco_id', '!=', null)->where('status', '1')->count();

        $count_passed_application = Permohonan::where('status', '2')->count();

        $count_failed_application = Permohonan::where('status', '3')->count();

        $new_application = Permohonan::where('exco_id', null)->get();

        return view('excos.dashboard', compact('count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application'));
    }

    public function permohonan()
    {
        return view('excos.permohonan.pilih');
    }

    public function permohonan_baru()
    {
        $processing_application = Permohonan::where('exco_id', null)->where('status', '1')->get();
        
        return view('excos.permohonan.baru', compact('processing_application'));
    }

    public function papar_permohonan($permohonan_id)
    {
        $permohonan = Permohonan::where('id', $permohonan_id)->first();

        // dd($permohonan);

        return view('excos.permohonan.papar', compact('permohonan'));
    }
}
