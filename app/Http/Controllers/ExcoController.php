<?php

namespace App\Http\Controllers;

use Storage;
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

    public function papar_permohonan(Request $request)
    {
        $permohonan = Permohonan::where('id', $request->permohonan_id)->first();

        return view('excos.permohonan.papar', compact('permohonan'));
    }

    public function download_permohonan(Request $request){
        // dd($request->all());
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        if($request->file_type == "application_letter"){
            return Storage::download($permohonan->application_letter);

        } elseif($request->file_type == "registration_certificate"){
            return Storage::download($permohonan->registration_certificate);

        } elseif ($request->file_type == "account_statement") {
            return Storage::download($permohonan->account_statement);

        } elseif ($request->file_type == "spending_statement") {
            return Storage::download($permohonan->spending_statement);

        } elseif ($request->file_type == "support_letter") {
            return Storage::download($permohonan->support_letter);

        } elseif ($request->file_type == "committee_member") {
            return Storage::download($permohonan->committee_member);

        } elseif ($request->file_type == "certificate_or_letter_temple") {
            return Storage::download($permohonan->certificate_or_letter_temple);

        } elseif ($request->file_type == "invitation_letter") {
            return Storage::download($permohonan->invitation_letter);

        } else{
            return redirect()->back()->with('error', 'file_type not exist!');  
        }
    }
}
