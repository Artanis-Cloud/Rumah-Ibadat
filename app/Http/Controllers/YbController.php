<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\RumahIbadat;
use App\Models\Permohonan;
use App\Models\Tujuan;
use App\Models\Lampiran;
use App\Models\Batch;

use Illuminate\Http\Request;

class YbController extends Controller
{
    public function dashboard()
    {
        //==================================== DASHBOARD COUNTER TOKONG ====================================



        if (auth()->user()->user_role->tokong == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            //================== COUNT PASSED APPLICATION ==================

            $count_passed_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '2')->count();

            //================== COUNT REJECTED APPLICATION ==================

            $count_failed_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '3')->orWhere('status', '4')->count();


            //================== PERMOHONAN TERKINI LIST ==================

            $new_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->orderBy('created_at', 'asc')->get();
        }



        //==================================== DASHBOARD COUNTER KUIL ====================================



        if (auth()->user()->user_role->kuil == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_kuil;
            } else {
                $processing_application = $count_new_application_kuil;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            if (isset($count_processing_application)) {
                $count_processing_application = $count_processing_application + $count_processing_application_kuil;
            } else {
                $count_processing_application = $count_processing_application_kuil;
            }

            //================== COUNT PASSED APPLICATION ==================

            $count_passed_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('status', '2')->count();

            if (isset($count_passed_application)) {
                $count_passed_application = $count_passed_application + $count_passed_application_kuil;
            } else {
                $count_passed_application = $count_passed_application_kuil;
            }

            //================== COUNT REJECTED APPLICATION ==================

            $count_failed_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('status', '3')->orWhere('status', '4')->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_kuil;
            } else {
                $count_failed_application = $count_failed_application_kuil;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application + $new_application_kuil;
            } else {
                $new_application = $new_application_kuil;
            }
        }



        //==================================== DASHBOARD COUNTER GURDWARA ====================================



        if (auth()->user()->user_role->gurdwara == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->count();


            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_gurdwara;
            } else {
                $processing_application = $count_new_application_gurdwara;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            if (isset($count_processing_application)) {
                $count_processing_application = $count_processing_application + $count_processing_application_gurdwara;
            } else {
                $count_processing_application = $count_processing_application_gurdwara;
            }

            //================== COUNT PASSED APPLICATION ==================

            $count_passed_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('status', '2')->count();

            if (isset($count_passed_application)) {
                $count_passed_application = $count_passed_application + $count_passed_application_gurdwara;
            } else {
                $count_passed_application = $count_passed_application_gurdwara;
            }

            //================== COUNT REJECTED APPLICATION ==================

            $count_failed_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('status', '3')->orWhere('status', '4')->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_gurdwara;
            } else {
                $count_failed_application = $count_failed_application_gurdwara;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application + $new_application_gurdwara;
            } else {
                $new_application = $new_application_gurdwara;
            }
        }


        //==================================== DASHBOARD COUNTER GEREJA ====================================



        if (auth()->user()->user_role->gereja == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_gereja;
            } else {
                $processing_application = $count_new_application_gereja;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_gereja = Permohonan::whereHas('rumah_ibadat',function ($q) {
                    $q->where('category', 'GEREJA');
                }
            )->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->count();

            if (isset($count_processing_application)) {
                $count_processing_application = $count_processing_application + $count_processing_application_gereja;
            } else {
                $count_processing_application = $count_processing_application_gereja;
            }

            //================== COUNT PASSED APPLICATION ==================

            $count_passed_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('status', '2')->count();

            if (isset($count_passed_application)) {
                $count_passed_application = $count_passed_application + $count_passed_application_gereja;
            } else {
                $count_passed_application = $count_passed_application_gereja;
            }

            //================== COUNT REJECTED APPLICATION ==================

            $count_failed_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('status', '3')->orWhere('status', '4')->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_gereja;
            } else {
                $count_failed_application = $count_failed_application_gereja;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application + $new_application_gereja;
            } else {
                $new_application = $new_application_gereja;
            }
        }

        return view('ybs.dashboard', compact('count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application'));
    }

    public function permohonan()
    {
        return view('ybs.permohonan.pilih');
    }

    public function permohonan_baru()
    {

        if (auth()->user()->user_role->tokong == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if(isset($processing_application)){
                $processing_application = $processing_application->merge($kuil);
            }else{
                $processing_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gurdwara);
            } else {
                $processing_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gereja);
            } else {
                $processing_application = $gereja;
            }
        }
        

        return view('ybs.permohonan.baru', compact('processing_application'));
    }

    public function papar_permohonan(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        return view('ybs.permohonan.papar', compact('permohonan', 'exco'));
    }

    public function permohonan_semak_semula(Request $request)
    {
        // dd($request->all());

        $permohonan = Permohonan::findorfail($request->permohonan_id);
        //remove or null data
        foreach ($request->review as $review) {

            if ($review == "application_letter") {
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
                foreach ($permohonan->tujuan as $key => $tujuan) {
                    if ($tujuan->tujuan == "AKTIVITI KEAGAMAAN") {

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
        return redirect()->route('ybs.permohonan.baru')->with('success', 'Status permohonan telah dikemaskini.');
    }

    public function permohonan_pengesahan(Request $request)
    {
        // dd($request->all());
        $user_id = auth()->user()->id; //current user id
        $current_date = date('Y-m-d H:i:s'); //get current date
        $permohonan = Permohonan::findorfail($request->permohonan_id); //look current permohonan
        $total_fund = 0.00;
        $batch = Batch::first();

        

        //save peruntukan value
        foreach ($permohonan->tujuan as $tujuan) {

            if ($tujuan->tujuan == "AKTIVITI KEAGAMAAN") {
                $tujuan->peruntukan = $request->peruntukan_1;
                $tujuan->save();

                //count total fund
                $total_fund = $total_fund + $request->peruntukan_1;
            }

            if ($tujuan->tujuan == "PENDIDIKAN KEAGAMAAN") {
                $tujuan->peruntukan = $request->peruntukan_2;
                $tujuan->save();

                //count total fund
                $total_fund = $total_fund + $request->peruntukan_2;
            }

            if ($tujuan->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN") {
                $tujuan->peruntukan = $request->peruntukan_3;
                $tujuan->save();

                //count total fund
                $total_fund = $total_fund + $request->peruntukan_3;
            }

            if ($tujuan->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN") {
                $tujuan->peruntukan = $request->peruntukan_4;
                $tujuan->save();

                //count total fund
                $total_fund = $total_fund + $request->peruntukan_4;
            }

            if ($tujuan->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT") {
                $tujuan->peruntukan = $request->peruntukan_5;
                $tujuan->save();

                //count total fund
                $total_fund = $total_fund + $request->peruntukan_5;
            }
        }

        //assign batching
        
        if($permohonan->rumah_ibadat->category == "TOKONG"){
            $permohonan->batch = $batch->tokong; //assign permohonan batch

            $batch->tokong_counter = $batch->tokong_counter + 1;
            
            if($batch->tokong_counter == 10){
                $batch->tokong = $batch->tokong + 1; // add new batch
                $batch->tokong_counter = 0; // reset counter
            }
            $batch->save();
        }

        if ($permohonan->rumah_ibadat->category == "KUIL") {
            $permohonan->batch = $batch->kuil;

            $batch->kuil_counter = $batch->kuil_counter + 1;

            if ($batch->kuil_counter == 10) {
                $batch->kuil = $batch->kuil + 1; // add new batch
                $batch->kuil_counter = 0; // reset counter
            }
            $batch->save();
        }

        if ($permohonan->rumah_ibadat->category == "GURDWARA") {
            $permohonan->batch = $batch->gurdwara;

            $batch->gurdwara_counter = $batch->gurdwara_counter + 1;

            if ($batch->gurdwara_counter == 10) {
                $batch->gurdwara = $batch->gurdwara + 1; // add new batch
                $batch->gurdwara_counter = 0; // reset counter
            }
            $batch->save();
        }

        if ($permohonan->rumah_ibadat->category == "GEREJA") {
            $permohonan->batch = $batch->gereja;

            $batch->gereja_counter = $batch->gereja_counter + 1;

            if ($batch->gereja_counter == 10) {
                $batch->gereja = $batch->gereja + 1; // add new batch
                $batch->gereja_counter = 0; // reset counter
            }
            $batch->save();
        }

        //update permohonan
        $permohonan->yb_id = $user_id;
        $permohonan->yb_date_time = $current_date;
        $permohonan->review_yb = $request->review_yb;

        if ($request->payment == "EFT") {
            $permohonan->payment_method = 2;
        }
        
        $permohonan->total_fund = $total_fund;


        $permohonan->save();

        //redirect
        return redirect()->route('ybs.permohonan.baru')->with('success', 'Status permohonan telah disokong.');
    }

    public function permohonan_pembatalan(Request $request){

        //find current permohonan
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        //update status permohonan
        $permohonan->not_approved_id = auth()->user()->id;
        $permohonan->status = 3;
        $permohonan->save();

        return redirect()->route('ybs.permohonan.baru')->with('success', 'Permohonan telah dibatalkan.');
    }

    public function permohonan_sedang_diproses(){
        // dd("masuk");

        if (auth()->user()->user_role->tokong == 1) {
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id','!=', null)->where('exco_id', '!=', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($kuil);
            } else {
                $processing_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gurdwara);
            } else {
                $processing_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gereja);
            } else {
                $processing_application = $gereja;
            }
        }


        return view('ybs.permohonan.sedang-diproses', compact('processing_application'));
    }

    public function papar_permohonan_sedang_diproses(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = User::findorfail($permohonan->yb_id);

        return view('ybs.permohonan.papar-sedang-diproses', compact('permohonan', 'exco', 'yb'));
    }

    public function permohonan_semakan_semula()
    {
        // dd("masuk");

        if (auth()->user()->user_role->tokong == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '0')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($kuil);
            } else {
                $review_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($gurdwara);
            } else {
                $review_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('yb_id', null)->where('exco_id', '!=', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($gereja);
            } else {
                $review_application = $gereja;
            }
        }


        return view('ybs.permohonan.semak-semula', compact('review_application'));
    }

    public function permohonan_lulus()
    {
        // dd("masuk");

        if (auth()->user()->user_role->tokong == 1) {
            $approved_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '2')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('status', '2')->get();

            if (isset($approved_application)) {
                $approved_application = $approved_application->merge($kuil);
            } else {
                $approved_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('status', '2')->get();

            if (isset($approved_application)) {
                $approved_application = $approved_application->merge($gurdwara);
            } else {
                $approved_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('status', '2')->get();

            if (isset($approved_application)) {
                $approved_application = $approved_application->merge($gereja);
            } else {
                $approved_application = $gereja;
            }
        }


        return view('ybs.permohonan.lulus', compact('approved_application'));
    }

    public function permohonan_tidak_lulus()
    {
        // dd("masuk");

        if (auth()->user()->user_role->tokong == 1) {
            $rejected_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '3')->orWhere('status', '4')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('status', '3')->orWhere('status', '4')->get();

            if (isset($rejected_application)) {
                $rejected_application = $rejected_application->merge($kuil);
            } else {
                $rejected_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('status', '3')->orWhere('status', '4')->get();

            if (isset($rejected_application)) {
                $rejected_application = $rejected_application->merge($gurdwara);
            } else {
                $rejected_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('status', '3')->orWhere('status', '4')->get();

            if (isset($rejected_application)) {
                $rejected_application = $rejected_application->merge($gereja);
            } else {
                $rejected_application = $gereja;
            }
        }


        return view('ybs.permohonan.tidak-lulus', compact('rejected_application'));
    }
}
