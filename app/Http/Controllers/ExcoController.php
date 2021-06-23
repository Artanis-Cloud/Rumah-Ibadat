<?php

namespace App\Http\Controllers;

use Storage;

use App\Models\User;
use App\Models\UserRole;
use App\Models\RumahIbadat;
use App\Models\Permohonan;
use App\Models\Tujuan;
use App\Models\Lampiran;
use PDF;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ExcoController extends Controller
{
    public function dashboard()
    {
        $count_new_application = Permohonan::where('exco_id', null)->where('status', 1)->count();

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
        if(auth()->user()->user_role->tokong == 1){
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->gereja == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('status', '1')->get();
        }
        
        return view('excos.permohonan.baru', compact('processing_application'));
    }

    public function papar_permohonan(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        return view('excos.permohonan.papar', compact('permohonan'));
    }

    public function permohonan_semak_semula(Request $request){
        // dd($request->all());

        $permohonan = Permohonan::findorfail($request->permohonan_id);
        //remove or null data
        foreach($request->review as $review){

            if($review == "application_letter"){
                $permohonan->application_letter = "x";
            }

            if ($review == "registration_certificate") {
                $permohonan->registration_certificate = "x";
            }

            if ($review == "account_statement") {
                $permohonan->account_statement = "x";
            }

            if ($review == "spending_statement") {
                $permohonan->spending_statement = "x";
            }

            if ($review == "support_letter") {
                $permohonan->support_letter = "x";
            }

            if ($review == "AKTIVITI KEAGAMAAN") {
                foreach($permohonan->tujuan as $key => $tujuan){
                    if($tujuan->tujuan == "AKTIVITI KEAGAMAAN"){

                        //update status tujuan
                        $tujuan->status = 2;
                        $tujuan->save();

                        //delete all attachment
                        $lampiran = Lampiran::where('tujuan_id', $tujuan->id)->get();
                        $lampiran->each->delete();
                    }
                }
            }

            if ($review == "PENDIDIKAN KEAGAMAAN") {
                foreach ($permohonan->tujuan as $key => $tujuan) {
                    if ($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN") {

                        //update status tujuan
                        $tujuan->status = 2;
                        $tujuan->save();

                        //delete all attachment
                        $lampiran = Lampiran::where('tujuan_id', $tujuan->id)->get();
                        $lampiran->each->delete();
                    }
                }
            }

            if ($review == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN") {
                foreach ($permohonan->tujuan as $key => $tujuan) {
                    if ($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN") {

                        //update status tujuan
                        $tujuan->status = 2;
                        $tujuan->save();

                        //delete all attachment
                        $lampiran = Lampiran::where('tujuan_id', $tujuan->id)->get();
                        $lampiran->each->delete();
                    }
                }
            }

            if ($review == "BAIK PULIH/PENYELENGGARAAN BANGUNAN") {
                foreach ($permohonan->tujuan as $key => $tujuan) {
                    if ($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN") {

                        //update status tujuan
                        $tujuan->status = 2;
                        $tujuan->save();

                        //delete all attachment
                        $lampiran = Lampiran::where('tujuan_id', $tujuan->id)->get();
                        $lampiran->each->delete();
                    }
                }
            }

            if ($review == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT") {
                foreach ($permohonan->tujuan as $key => $tujuan) {
                    if ($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT") {

                        //update status tujuan
                        $tujuan->status = 2;
                        $tujuan->save();

                        //delete all attachment
                        $lampiran = Lampiran::where('tujuan_id', $tujuan->id)->get();
                        $lampiran->each->delete();
                    }
                }
            }
        }

        //update permohonan
        $permohonan->review_to_applicant_id = auth()->user()->id;
        $permohonan->review_to_applicant = $request->review_to_applicant;
        $permohonan->status = 0;

        $permohonan->save();

        //redirect
        return redirect()->route('excos.permohonan.baru')->with('success', 'Status permohonan telah dikemaskini.');
    }

    public function permohonan_pengesahan(Request $request){

        // dd($request->all());
        $user_id = auth()->user()->id; //current user id
        $current_date = date('Y-m-d H:i:s'); //get current date
        $permohonan = Permohonan::findorfail($request->permohonan_id);//look current permohonan

        $permohonan->exco_id = $user_id;
        $permohonan->exco_date_time = $current_date;
        $permohonan->review_exco = $request->review_exco;

        $permohonan->save();

        //save peruntukan value
        foreach($permohonan->tujuan as $tujuan){

            if($tujuan->tujuan == "AKTIVITI KEAGAMAAN" && $request->peruntukan_1 !=  null){
                $tujuan->peruntukan = $request->peruntukan_1;
                $tujuan->save();
            }

            if ($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN" && $request->peruntukan_2 !=  null) {
                $tujuan->peruntukan = $request->peruntukan_2;
                $tujuan->save();
            }

            if ($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN" && $request->peruntukan_3 !=  null) {
                $tujuan->peruntukan = $request->peruntukan_3;
                $tujuan->save();
            }

            if ($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN" && $request->peruntukan_4 !=  null) {
                $tujuan->peruntukan = $request->peruntukan_4;
                $tujuan->save();
            }

            if ($tujuan->tujuan =="PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT" && $request->peruntukan_5 !=  null) {
                $tujuan->peruntukan = $request->peruntukan_5;
                $tujuan->save();
            }
        }

        //redirect
        return redirect()->route('excos.permohonan.baru')->with('success', 'Status permohonan telah disahkan.');
    }

    public function permohonan_pembatalan(Request $request)
    {
        //find current permohonan
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        //update status permohonan
        $permohonan->not_approved_id = auth()->user()->id;
        $permohonan->status = 3;
        $permohonan->save();

        return redirect()->route('excos.permohonan.baru')->with('success', 'Permohonan telah dibatalkan.');
    }

    public function permohonan_sedang_diproses()
    {
        if (auth()->user()->user_role->tokong == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->gereja == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();
        }

        return view('excos.permohonan.sedang-diproses', compact('processing_application'));
    }

    public function papar_permohonan_sedang_diproses(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        return view('excos.permohonan.papar-sedang-diproses', compact('permohonan', 'exco'));
    }

    public function permohonan_semakan_semula()
    {
        if (auth()->user()->user_role->tokong == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();
        }

        if (auth()->user()->user_role->gereja == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();
        }

        return view('excos.permohonan.semak-semula', compact('review_application'));
    }

    public function papar_permohonan_semakan_semula(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $user_in_charge = User::findorfail($permohonan->review_to_applicant_id);

        return view('excos.permohonan.papar-semak-semula', compact('permohonan', 'user_in_charge'));
    }

    public function permohonan_lulus(Request $request)
    {
        $permohonan = Permohonan::where('status', '2')->get();

        return view('excos.permohonan.lulus', compact('permohonan'));
    }

    public function permohonan_tidak_lulus(Request $request)
    {
        $permohonan = Permohonan::where('status', '3')->get();

        return view('excos.permohonan.tidak-lulus', compact('permohonan'));
    }

    public function papar_permohonan_tidak_lulus(Request $request)
    {
        // dd($request->all());
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->not_approved_id);

        return view('excos.permohonan.papar-tidak-lulus', compact('permohonan','exco'));
    }

    public function download_permohonan(Request $request){

        $permohonan = Permohonan::findorfail($request->permohonan_id);
        
        if($request->file_type == "application_letter"){

            $data["info"] = $permohonan;
            // $pdf = PDF::loadView('mypdf.html', $data);
            return $pdf->stream(basename($permohonan->application_letter));

            // return Storage::download($permohonan->application_letter);

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

    public function rumah_ibadat(){
        
        return view('excos.rumah-ibadat.pilih');
    }

    public function senarai_rumah_ibadat()
    {
        if (auth()->user()->user_role->tokong == 1) {
            $rumah_ibadat = RumahIbadat::where('category', 'TOKONG')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $rumah_ibadat = RumahIbadat::where('category', 'KUIL')->get();
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $rumah_ibadat = RumahIbadat::where('category', 'GURDWARA')->get();
        }

        if (auth()->user()->user_role->gereja == 1) {
            $rumah_ibadat = RumahIbadat::where('category', 'GEREJA')->get();
        }
        return view('excos.rumah-ibadat.senarai', compact('rumah_ibadat'));
    }

    public function papar_rumah_ibadat(Request $request){
        // dd($request->all());

        $rumah_ibadat = RumahIbadat::findorfail($request->rumah_ibadat_id);

        return view('excos.rumah-ibadat.papar', compact('rumah_ibadat'));
    }
}
