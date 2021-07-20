<?php

namespace App\Http\Controllers;

use DB;
use Storage;

use App\Models\User;
use App\Models\UserRole;
use App\Models\RumahIbadat;
use App\Models\Permohonan;
use App\Models\Tujuan;
use App\Models\Lampiran;
use App\Models\Batch;
use App\Models\Peruntukan;
use App\Models\SpecialApplication;
use Illuminate\Http\Request;

class YbController extends Controller
{
    public function dashboard()
    {
        //==================================== DASHBOARD COUNTER TOKONG ====================================
        $current_year = date('Y'); //get current date
        $annual_report = Peruntukan::whereYear('created_at', $current_year)->first();

        $laporan_tokong = null;
        $khas_tokong = null;
        $count_khas_tokong = null;


        $laporan_kuil = null;
        $khas_kuil = null;
        $count_khas_kuil = null;

        $laporan_gurdwara = null;
        $khas_gurdwara = null;
        $count_khas_gurdwara = null;

        $laporan_gereja = null;
        $khas_gereja = null;
        $count_khas_gereja = null;


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

            $special_application = SpecialApplication::where('exco_id', '!=', null)->where('yb_id', null)->where('category', 'TOKONG')->where('status','1')->get();

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_tokong = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'TOKONG' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $special_application_pass = SpecialApplication::where('category', 'TOKONG')->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_tokong = collect($special_application_pass)->sum('requested_amount');

            $count_khas_tokong = $special_application_pass->count();
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
                $count_new_application = $count_new_application_kuil;
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
                $new_application = $new_application->merge($new_application_kuil);
            } else {
                $new_application = $new_application_kuil;
            }

            $special_application_kuil = SpecialApplication::where('category', 'KUIL')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_kuil);
            } else {
                $special_application = $special_application_kuil;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_kuil = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'KUIL' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $special_application_pass = SpecialApplication::where(
                'category',
                'KUIL'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_kuil = collect($special_application_pass)->sum('requested_amount');

            $count_khas_kuil = $special_application_pass->count();
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
                $new_application = $new_application->merge($new_application_gurdwara);
            } else {
                $new_application = $new_application_gurdwara;
            }

            $special_application_gurdwara = SpecialApplication::where('category', 'GURDWARA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gurdwara);

            } else {
                $special_application = $special_application_gurdwara;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_gurdwara = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'GURDWARA' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $special_application_pass = SpecialApplication::where(
                'category',
                'GURDWARA'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_gurdwara = collect($special_application_pass)->sum('requested_amount');

            $count_khas_gurdwara = $special_application_pass->count();
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
                $new_application = $new_application->merge($new_application_gereja);
            } else {
                $new_application = $new_application_gereja;
            }

            $special_application_gereja = SpecialApplication::where('category', 'GEREJA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gereja);
            } else {
                $special_application = $special_application_gereja;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_gereja = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'GEREJA' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $special_application_pass = SpecialApplication::where(
                'category',
                'GEREJA'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_gereja = collect($special_application_pass)->sum('requested_amount');

            $count_khas_gereja = $special_application_pass->count();
        }

        return view('ybs.dashboard', compact('current_year', 'annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));
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

    public function papar_permohonan_semakan_semula(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $user_in_charge = User::findorfail($permohonan->review_to_applicant_id);

        return view('ybs.permohonan.papar-semak-semula', compact('permohonan', 'user_in_charge'));
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

    public function papar_permohonan_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = User::findorfail($permohonan->yb_id);

        $upen = User::findorfail($permohonan->upen_id);

        return view('ybs.permohonan.papar-lulus', compact('permohonan', 'exco', 'yb', 'upen'));
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

    public function papar_permohonan_tidak_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = null;
        if ($permohonan->status == 3) {
            $exco = User::findorfail($permohonan->not_approved_id);
        }

        return view('ybs.permohonan.papar-tidak-lulus', compact('permohonan', 'exco'));
    }

    public function permohonan_khas()
    {

        if (auth()->user()->user_role->tokong == 1) {
            $special_application = SpecialApplication::where('exco_id', '!=', null)->where('yb_id', null)->where('category', 'TOKONG')->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $special_application_kuil = SpecialApplication::where('exco_id', '!=', null)->where('yb_id', null)->where('category', 'KUIL')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_kuil);
            } else {
                $special_application = $special_application_kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $special_application_gurdwara = SpecialApplication::where('exco_id', '!=', null)->where('yb_id', null)->where('category', 'GURDWARA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gurdwara);
            } else {
                $special_application = $special_application_gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $special_application_gereja = SpecialApplication::where('exco_id', '!=', null)->where('yb_id', null)->where('category', 'GEREJA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gereja);

            } else {
                $special_application = $special_application_gereja;
            }
        }


        return view('ybs.permohonan.permohonan-khas.senarai', compact('special_application'));
    }

    public function papar_permohonan_khas(Request $request){
        // dd("papar permohonan khas");
        $special_application = SpecialApplication::findorfail($request->permohonan_khas_id);
        // dd($special_application);
        $exco = User::findorfail($special_application->exco_id);

        return view('ybs.permohonan.permohonan-khas.papar', compact('special_application', 'exco'));
    }

    public function papar_permohonan_khas_lulus(Request $request)
    {
        // dd($request->all());
        $current_date = date('Y-m-d H:i:s'); //get current date

        $special_application = SpecialApplication::findorfail($request->permohonan_id);

        $special_application->status = 2;
        $special_application->yb_id = auth()->user()->id;
        $special_application->yb_date_time = $current_date;

        $special_application->save();

        //fund calculation
        $current_year = date('Y'); //get current date
        $peruntukan = Peruntukan::whereYear('created_at', $current_year)->first();
        $peruntukan->current_fund = $peruntukan->current_fund + $special_application->requested_amount;
        $peruntukan->balance_fund = $peruntukan->total_fund - $peruntukan->current_fund;

        if($special_application->category == "TOKONG"){
            $peruntukan->current_tokong = $peruntukan->current_tokong + $special_application->requested_amount;
            $peruntukan->balance_tokong = $peruntukan->total_tokong - $peruntukan->current_tokong;

        } elseif($special_application->category == "KUIL"){
            $peruntukan->current_kuil = $peruntukan->current_kuil + $special_application->requested_amount;
            $peruntukan->balance_kuil = $peruntukan->total_kuil - $peruntukan->current_kuil;

        } elseif ($special_application->category == "GURDWARA") {
            $peruntukan->current_gurdwara = $peruntukan->current_gurdwara + $special_application->requested_amount;
            $peruntukan->balance_gurdwara = $peruntukan->total_gurdwara - $peruntukan->current_gurdwara;

        } elseif ($special_application->category == "GEREJA") {
            $peruntukan->current_gereja = $peruntukan->current_gereja + $special_application->requested_amount;
            $peruntukan->balance_gereja = $peruntukan->total_gereja - $peruntukan->current_gereja;

        }

        $peruntukan->save();

        return redirect()->route('ybs.permohonan.khas')->with('success', 'Permohonan diluluskan.');
    }

    public function papar_permohonan_khas_tidak_lulus(Request $request)
    {
        // dd($request->all());
        $current_date = date('Y-m-d H:i:s'); //get current date

        $special_application = SpecialApplication::findorfail($request->permohonan_id);

        $special_application->status = 0;
        $special_application->not_approved_id = auth()->user()->id;

        $special_application->save();

        return redirect()->route('ybs.permohonan.khas')->with('success', 'Permohonan tidak diluluskan.');
    }

    public function rumah_ibadat()
    {
        return view('ybs.rumah-ibadat.pilih');
    }

    public function senarai_rumah_ibadat()
    {

        if (auth()->user()->user_role->tokong == 1) {
            $rumah_ibadat = RumahIbadat::where('category', 'TOKONG')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = RumahIbadat::where('category', 'KUIL')->get();

            if (isset($rumah_ibadat)) {
                $rumah_ibadat = $rumah_ibadat->merge($kuil);
            } else {
                $rumah_ibadat = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = RumahIbadat::where('category', 'GURDWARA')->get();

            if (isset($rumah_ibadat)) {
                $rumah_ibadat = $rumah_ibadat->merge($gurdwara);
            } else {
                $rumah_ibadat = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = RumahIbadat::where('category', 'GEREJA')->get();

            if (isset($rumah_ibadat)) {
                $rumah_ibadat = $rumah_ibadat->merge($gereja);
            } else {
                $rumah_ibadat = $gereja;
            }
        }

        return view('ybs.rumah-ibadat.senarai', compact('rumah_ibadat'));
    }

    public function papar_rumah_ibadat(Request $request)
    {

        $rumah_ibadat = RumahIbadat::findorfail($request->rumah_ibadat_id);

        return view('ybs.rumah-ibadat.papar', compact('rumah_ibadat'));
    }
}
