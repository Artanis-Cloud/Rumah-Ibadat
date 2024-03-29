<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\HistoryApplication;

use App\Notifications\Permohonan\NotApproved;
use DB;
use Storage;

use App\Models\User;
use App\Models\UserRole;
use App\Models\RumahIbadat;
use App\Models\Permohonan;
use App\Models\Tujuan;
use App\Models\Lampiran;
use App\Models\Peruntukan;
use App\Models\SpecialApplication;
use App\Notifications\Permohonan\ExcoApproved;
use App\Notifications\Permohonan\SemakSemula;
use App\Notifications\PermohonanKhas\SahkanPermohonan;
use App\Notifications\PermohonanKhas\TidakLulus;
use PDF;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class ExcoController extends Controller
{
    public function dashboard()
    {

        //==================================== DASHBOARD COUNTER TOKONG ====================================
        $pengumuman = Announcement::where('status','1')->where('exco', '1')->get();

        $current_year = date('Y'); //get current date
        //checker peruntukan
        $current_date = date('Y-m-d H:i:s'); //get current date
        $annual_report_counter = Peruntukan::whereYear('created_at', $current_year)->count();

        if ($annual_report_counter == 0) {
            $peruntukan = Peruntukan::create([
                'total_fund' => '1.00',
                'current_fund' => '1.00',
                'balance_fund' => '0.00',


                'total_tokong' => '1.00',
                'current_tokong' => '1.00',
                'balance_tokong' => '0.00',

                'total_kuil' => '1.00',
                'current_kuil' => '1.00',
                'balance_kuil' => '0.00',

                'total_gurdwara' => '1.00',
                'current_gurdwara' => '1.00',
                'balance_gurdwara' => '0.00',

                'total_gereja' => '1.00',
                'current_gereja' => '1.00',
                'balance_gereja' => '0.00',

                'created_at' => $current_date,
                'updated_at' => $current_date,
            ]);
        }
        $annual_report = Peruntukan::whereYear('created_at', $current_year)->first();

        $balance_tokong = null;
        $balance_kuil = null;
        $balance_gurdwara = null;
        $balance_gereja = null;

        $total_tokong = null;
        $total_kuil = null;
        $total_gurdwara = null;
        $total_gereja = null;
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
            })->where('exco_id', null)->where('status', '1')->count();



            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->count();

            //================== COUNT PASSED APPLICATION ==================

            $count_passed_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '2')->count();

            //================== COUNT REJECTED APPLICATION ==================

            $count_failed_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->count();


            //================== PERMOHONAN TERKINI LIST ==================

            $new_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', null)->where('status', '1')->get();

            $special_application = SpecialApplication::where('exco_id', null)->where('category', 'TOKONG')->where('status', '1')->get();


            //================== LAPORAN PERBELANJAAN ==================

            $laporan_tokong = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'TOKONG' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $total_peruntukan_tokong = 0.00;
            if($laporan_tokong){
                foreach($laporan_tokong as $data){
                    $total_peruntukan_tokong += $data->peruntukan;
                }
            }

            $special_application_pass = SpecialApplication::where('category', 'TOKONG')->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_tokong = collect($special_application_pass)->sum('requested_amount');

            $count_khas_tokong = $special_application_pass->count();

            $total_tokong = $total_peruntukan_tokong + $khas_tokong;

            $balance_tokong = $annual_report->total_tokong - $total_tokong;

            // return view('excos.dashboard', compact('balance_tokong','total_tokong','pengumuman', 'current_year','annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));

        }



        //==================================== DASHBOARD COUNTER KUIL ====================================



        if (auth()->user()->user_role->kuil == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('status', '1')->count();

            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_kuil;
            } else {
                $count_new_application = $count_new_application_kuil;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->count();

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
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_kuil;
            } else {
                $count_failed_application = $count_failed_application_kuil;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application->merge($new_application_kuil);

            } else {
                $new_application = $new_application_kuil;
            }

            $special_application_kuil = SpecialApplication::where('exco_id', null)->where('category', 'KUIL')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_kuil);

            } else {
                $special_application = $special_application_kuil;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_kuil = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'KUIL' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $total_peruntukan_kuil = 0.00;
            if($laporan_kuil){
                foreach($laporan_kuil as $data){
                    $total_peruntukan_kuil += $data->peruntukan;
                }
            }

            $special_application_pass = SpecialApplication::where('category',
                'KUIL'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_kuil = collect($special_application_pass)->sum('requested_amount');

            $count_khas_kuil = $special_application_pass->count();

            $total_kuil = $total_peruntukan_kuil + $khas_kuil;

            $balance_kuil = $annual_report->total_kuil - $total_kuil;

            // return view('excos.dashboard', compact('balance_kuil','total_kuil','pengumuman', 'current_year','annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));


        }



        //==================================== DASHBOARD COUNTER GURDWARA ====================================



        if (auth()->user()->user_role->gurdwara == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('status', '1')->count();


            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_gurdwara;
            } else {
                $processing_application = $count_new_application_gurdwara;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->count();

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
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_gurdwara;
            } else {
                $count_failed_application = $count_failed_application_gurdwara;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application->merge($new_application_gurdwara);
            } else {
                $new_application = $new_application_gurdwara;
            }

            $special_application_gurdwara = SpecialApplication::where('exco_id', null)->where('category', 'GURDWARA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gurdwara);
            } else {
                $special_application = $special_application_gurdwara;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_gurdwara = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'GURDWARA' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $total_peruntukan_gurdwara = 0.00;
            if($laporan_gurdwara){
                foreach($laporan_gurdwara as $data){
                    $total_peruntukan_gurdwara += $data->peruntukan;
                }
            }

            $special_application_pass = SpecialApplication::where(
                'category',
                'GURDWARA'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_gurdwara = collect($special_application_pass)->sum('requested_amount');

            $count_khas_gurdwara = $special_application_pass->count();

            $total_gurdwara = $total_peruntukan_gurdwara + $khas_gurdwara;

            $balance_gurdwara = $annual_report->total_gurdwara - $total_gurdwara;

            // return view('excos.dashboard', compact('balance_gurdwara','total_gurdwara','pengumuman', 'current_year','annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));

        }


        //==================================== DASHBOARD COUNTER GEREJA ====================================



        if (auth()->user()->user_role->gereja == 1) {

            //================== COUNT NEW APPLICATION ==================

            $count_new_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('status', '1')->count();

            if (isset($count_new_application)) {
                $count_new_application = $count_new_application + $count_new_application_gereja;
            } else {
                $count_new_application = $count_new_application_gereja;
            }

            //================== COUNT PROCESSING APPLICATION ==================

            $count_processing_application_gereja = Permohonan::whereHas('rumah_ibadat',
                function ($q) {
                    $q->where('category', 'GEREJA');
                }
            )->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->count();

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
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->count();

            if (isset($count_failed_application)) {
                $count_failed_application = $count_failed_application + $count_failed_application_gereja;
            } else {
                $count_failed_application = $count_failed_application_gereja;
            }

            //================== PERMOHONAN TERKINI LIST ==================

            $new_application_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($new_application)) {
                $new_application = $new_application->merge($new_application_gereja);


            } else {
                $new_application = $new_application_gereja;
            }

            $special_application_gereja = SpecialApplication::where('exco_id', null)->where('category', 'GEREJA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gereja);
            } else {
                $special_application = $special_application_gereja;
            }

            //================== LAPORAN PERBELANJAAN ==================

            $laporan_gereja = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'GEREJA' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

            $total_peruntukan_gereja = 0.00;
            if($laporan_gereja){
                foreach($laporan_gereja as $data){
                    $total_peruntukan_gereja += $data->peruntukan;
                }
            }

            $special_application_pass = SpecialApplication::where(
                'category',
                'GEREJA'
            )->where('status', '2')->whereYear('created_at', date('Y'))->get();

            $khas_gereja = collect($special_application_pass)->sum('requested_amount');

            $count_khas_gereja = $special_application_pass->count();

            $total_gereja = $total_peruntukan_gereja + $khas_gereja;

            $balance_gereja = $annual_report->total_gereja - $total_gereja;

            // return view('excos.dashboard', compact('balance_gereja','total_gereja','pengumuman', 'current_year','annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));

        }

        // dd($laporan_tokong);

        return view('excos.dashboard', compact('balance_tokong','balance_kuil','balance_gurdwara','balance_gereja','total_tokong','total_kuil','total_gurdwara','total_gereja','pengumuman', 'current_year','annual_report', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'count_new_application', 'count_processing_application', 'count_passed_application', 'count_failed_application', 'new_application', 'special_application'));
    }

    public function permohonan()
    {
        return view('excos.permohonan.pilih');
    }

    public function permohonan_status(){

        if (auth()->user()->user_role->tokong == 1) {
            $permohonan = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->orderBy('created_at', 'asc')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $permohonan_kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->orderBy('created_at', 'asc')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_kuil);
            } else {
                $permohonan = $permohonan_kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $permohonan_gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->orderBy('created_at', 'asc')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_gurdwara);
            } else {
                $permohonan = $permohonan_gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $permohonan_gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->orderBy('created_at', 'asc')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_gereja);
            } else {
                $permohonan = $permohonan_gereja;
            }
        }

        return view('excos.permohonan.status-permohonan', compact('permohonan'));
    }

    public function print_permohonan(Request $request)
    {
        // dd($request->all());
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = null;
        if ($permohonan->exco_id != null) {
            $exco = User::findorfail($permohonan->exco_id);
        }

        $yb = null;
        if ($permohonan->yb_id != null) {
            $yb = User::findorfail($permohonan->yb_id);
        }

        $upen = null;
        if ($permohonan->upen_id != null) {
            $upen = User::findorfail($permohonan->upen_id);
        }

        $review_to_applicant_id = null;
        if ($permohonan->review_to_applicant_id != null) {
            $review_to_applicant_id = User::findorfail($permohonan->review_to_applicant_id);
        }

        $not_approved_id = null;
        if ($permohonan->not_approved_id != null) {
            $not_approved_id = User::findorfail($permohonan->not_approved_id);
        }


        return view('excos.permohonan.print', compact('permohonan', 'exco', 'yb', 'upen', 'review_to_applicant_id', 'not_approved_id'));
    }

    public function print_permohonan_khas(Request $request){
        $permohonan = SpecialApplication::findorfail($request->permohonan_khas_id);

        $exco = null;
        if($permohonan->exco_id != null){
            $exco = User::findorfail($permohonan->exco_id);
        }

        $yb = null;
        if ($permohonan->yb_id != null) {
            $yb = User::findorfail($permohonan->yb_id);
        }

        $not_approved_by = null;
        if($permohonan->not_approved_id){
            $not_approved_by = User::findorfail($permohonan->not_approved_id);
        }
        // dd($permohonan);
        return view('excos.permohonan.permohonan-khas.print', compact('permohonan', 'exco', 'yb', 'not_approved_by'));
    }

    public function permohonan_baru()
    {
        if(auth()->user()->user_role->tokong == 1){
            $processing_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', null)->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($kuil);
            } else {
                $processing_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gurdwara);
            } else {
                $processing_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gereja);
            } else {
                $processing_application = $gereja;
            }
        }

        return view('excos.permohonan.baru', compact('processing_application'));
    }

    public function papar_permohonan(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        //=============== SEJARAH PERMOHONAN =============================

        $nama_rumah_ibadat = $permohonan->rumah_ibadat->name_association;

        $nombor_bank_akaun = $permohonan->rumah_ibadat->bank_account;

        // $nombor_bank_akaun = "8009898040"; //testing for dummy sejarah permohonan

        $nombor_pendaftaran = null;

        if($permohonan->rumah_ibadat->registration_type == "SENDIRI"){
            $nombor_pendaftaran = $permohonan->rumah_ibadat->registration_number;
        } else{
            $nombor_pendaftaran = explode("%", $permohonan->rumah_ibadat->registration_number, 2)[1];
        }
        $sejarah_permohonan = DB::select(DB::raw("SELECT * FROM `history_applications` WHERE rumah_ibadat LIKE '%$nama_rumah_ibadat%' OR no_pendaftaran LIKE '%$nombor_pendaftaran%' OR no_akaun LIKE '%$nombor_bank_akaun%'"));
        // $sejarah_permohonan = DB::select(DB::raw('SELECT * FROM `history_applications` WHERE rumah_ibadat LIKE "%$nama_rumah_ibadat%" OR no_pendaftaran LIKE "%$nombor_pendaftaran%" OR no_akaun LIKE "%$nombor_bank_akaun%"'));
        // dd($sejarah_permohonan);
        $history_application_system = Permohonan::where('rumah_ibadat_id', $permohonan->rumah_ibadat->id)->where('status','2')->get();
        // dd($history_application_system);


        //=============== SEJARAH PERMOHONAN =============================

        return view('excos.permohonan.papar', compact('permohonan', 'sejarah_permohonan', 'history_application_system'));
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

        $permohonan->notify(new SemakSemula());
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

        $permohonan->notify(new ExcoApproved()); // send email notification to yb

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

        $permohonan->notify(new NotApproved());

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
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($kuil);
            } else {
                $processing_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gurdwara);
            } else {
                $processing_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', '!=', null)->where('yb_id', null)->where('status', '1')->get();

            if (isset($processing_application)) {
                $processing_application = $processing_application->merge($gereja);
            } else {
                $processing_application = $gereja;
            }
        }

        return view('excos.permohonan.sedang-diproses', compact('processing_application'));
    }

    public function papar_permohonan_sedang_diproses(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = null;

        if($permohonan->yb_id != null){
            $yb = User::findorfail($permohonan->yb_id);
        }

        return view('excos.permohonan.papar-sedang-diproses', compact('permohonan', 'exco', 'yb'));
    }

    public function permohonan_semakan_semula()
    {
        if (auth()->user()->user_role->tokong == 1) {
            $review_application = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($kuil);
            } else {
                $review_application = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($gurdwara);
            } else {
                $review_application = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('exco_id', null)->where('yb_id', null)->where('status', '0')->get();

            if (isset($review_application)) {
                $review_application = $review_application->merge($gereja);
            } else {
                $review_application = $gereja;
            }
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
        if (auth()->user()->user_role->tokong == 1) {
            $permohonan = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where('status', '2')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where('status', '2')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($kuil);
            } else {
                $permohonan = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where('status', '2')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($gurdwara);
            } else {
                $permohonan = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where('status', '2')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($gereja);
            } else {
                $permohonan = $gereja;
            }
        }

        return view('excos.permohonan.lulus', compact('permohonan'));
    }

    public function papar_permohonan_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = User::findorfail($permohonan->yb_id);

        $upen = User::findorfail($permohonan->upen_id);

        return view('excos.permohonan.papar-lulus', compact('permohonan', 'exco', 'yb', 'upen'));
    }

    public function permohonan_tidak_lulus(Request $request)
    {

        if (auth()->user()->user_role->tokong == 1) {
            $permohonan = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'TOKONG');
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $kuil = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'KUIL');
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($kuil);
            } else {
                $permohonan = $kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $gurdwara = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GURDWARA');
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($gurdwara);
            } else {
                $permohonan = $gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $gereja = Permohonan::whereHas('rumah_ibadat', function ($q) {
                $q->where('category', 'GEREJA');
            })->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($gereja);
            } else {
                $permohonan = $gereja;
            }
        }

        return view('excos.permohonan.tidak-lulus', compact('permohonan'));
    }

    public function papar_permohonan_tidak_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = null;
        if($permohonan->status == 3){
            $exco = User::findorfail($permohonan->not_approved_id);
        }

        return view('excos.permohonan.papar-tidak-lulus', compact('permohonan','exco'));
    }

    public function sejarah_permohonan()
    {
        return view('excos.permohonan.sejarah');
    }

    public function sejarah_permohonan_ajax()
    {
        # code...
        $sejarah_permohonan = HistoryApplication::get();
        $sejarah_permohonan = DB::select('select id, rumah_ibadat, alamat, no_pendaftaran, sebab_permohonan, no_akaun, bank, jumlah_kelulusan, tahun from history_applications');
        $permohonan = DB::select(DB::raw("select YEAR(tujuans.created_at) as tahun, rumah_ibadats.name_association as rumah_ibadat, rumah_ibadats.address as alamat, tujuans.tujuan as sebab_permohonan, rumah_ibadats.registration_type, rumah_ibadats.registration_number as no_pendaftaran, rumah_ibadats.bank_account as no_akaun, rumah_ibadats.bank_name as bank, permohonans.total_fund as jumlah_kelulusan FROM tujuans, rumah_ibadats, permohonans WHERE tujuans.permohonan_id = permohonans.id AND permohonans.rumah_ibadat_id = rumah_ibadats.id AND permohonans.status = '2'"));
        $permohonan_list = array_merge($sejarah_permohonan, $permohonan);

        // dd($permohonan_list);

        return Datatables::of($permohonan_list)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                // dd($row);
                // $btn = '<a href="' . route('new-inventory-form.show', $row->id) . '" class="btn btn-info">View</a>';
                // $btn = $btn . '<a href="' . route('new-inventory-form.show', $row->id) . '" class="btn btn-danger">Delete</a>';

                if ($row->tahun > 2021) {
                    $btn = '<i class="far fa-check-circle" style="color: green; font-size: 30px;"></i>';
                } else {
                    $btn = '<i class="far fa-times-circle" style="color: red; font-size: 30px;"></i>';
                }

                return $btn;
            })
            ->editColumn('alamat', function ($row) {
                if ($row->alamat == '') {
                    return 'Tiada Data';
                } else {
                    return $row->alamat;
                }
            })
            ->editColumn('no_pendaftaran', function ($row) {
                if ($row->no_pendaftaran == '') {
                    return 'Tiada Data';
                } else {
                    if (str_contains($row->no_pendaftaran, '%')) {
                        return (explode("%", $row->no_pendaftaran, 2)[1]);
                    } else {
                        return $row->no_pendaftaran;
                    }
                }
            })
            ->editColumn('sebab_permohonan', function ($row) {
                if ($row->sebab_permohonan == '') {
                    return 'Tiada Data';
                } else {
                    return $row->sebab_permohonan;
                }
            })
            ->editColumn('jumlah_kelulusan', function ($row) {
                if ($row->jumlah_kelulusan == '') {
                    return 'Tiada Data';
                } else {
                    if ($row->tahun > 2020){
                        $jumlah = $row->jumlah_kelulusan;
                        $jumlah = "RM " .  $jumlah;
                        return $jumlah;

                    }else{

                        $jumlah = "RM " .  $row->jumlah_kelulusan;
                        return $jumlah;
                    }
                }
            })
            // ->rawColumns(['action'])
            ->make(true);
    }

    public function permohonan_khas_status(){

        if (auth()->user()->user_role->tokong == 1) {

            $permohonan = SpecialApplication::where('category','TOKONG')->orderBy('created_at', 'asc')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {

            $permohonan_kuil = SpecialApplication::where('category', 'KUIL')->orderBy('created_at', 'asc')->get();


            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_kuil);
            } else {
                $permohonan = $permohonan_kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {

            $permohonan_gurdwara = SpecialApplication::where('category', 'GURDWARA')->orderBy('created_at', 'asc')->get();


            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_gurdwara);
            } else {
                $permohonan = $permohonan_gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {

            $permohonan_gereja = SpecialApplication::where('category', 'GEREJA')->orderBy('created_at', 'asc')->get();

            if (isset($permohonan)) {
                $permohonan = $permohonan->merge($permohonan_gereja);
            } else {
                $permohonan = $permohonan_gereja;
            }
        }

        return view('excos.permohonan.permohonan-khas.status-permohonan', compact('permohonan'));
    }

    public function permohonan_khas(){
        if (auth()->user()->user_role->tokong == 1) {
            $special_application = SpecialApplication::where('exco_id', null)->where('category', 'TOKONG')->where('status', '1')->get();
        }

        if (auth()->user()->user_role->kuil == 1) {
            $special_application_kuil = SpecialApplication::where('exco_id', null)->where('category', 'KUIL')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_kuil);

            } else {
                $special_application = $special_application_kuil;
            }
        }

        if (auth()->user()->user_role->gurdwara == 1) {
            $special_application_gurdwara = SpecialApplication::where('exco_id', null)->where('category', 'GURDWARA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gurdwara);

            } else {
                $special_application = $special_application_gurdwara;
            }
        }

        if (auth()->user()->user_role->gereja == 1) {
            $special_application_gereja = SpecialApplication::where('exco_id', null)->where('category', 'GEREJA')->where('status', '1')->get();

            if (isset($special_application)) {
                $special_application = $special_application->merge($special_application_gereja);

            } else {
                $special_application = $special_application_gereja;
            }
        }


        return view('excos.permohonan.permohonan-khas.senarai', compact('special_application'));
    }

    public function papar_permohonan_khas(Request $request)
    {
        // dd("papar permohonan khas");
        $special_application = SpecialApplication::findorfail($request->permohonan_khas_id);
        // dd($special_application);

        return view('excos.permohonan.permohonan-khas.papar', compact('special_application'));
    }

    public function papar_permohonan_khas_lulus(Request $request)
    {
        // dd($request->all());
        $current_date = date('Y-m-d H:i:s'); //get current date

        $special_application = SpecialApplication::findorfail($request->permohonan_id);

        $special_application->exco_id = auth()->user()->id;
        $special_application->exco_date_time = $current_date;

        $special_application->save();

        $special_application->notify(new SahkanPermohonan());

        return redirect()->route('excos.permohonan.khas')->with('success', 'Permohonan ini telah disahkan.');
    }

    public function papar_permohonan_khas_tidak_lulus(Request $request)
    {
        // dd($request->all());
        $current_date = date('Y-m-d H:i:s'); //get current date

        $special_application = SpecialApplication::findorfail($request->permohonan_id);

        $special_application->status = 0;
        $special_application->not_approved_id = auth()->user()->id;

        $special_application->save();

        $special_application->notify(new TidakLulus());

        return redirect()->route('excos.permohonan.khas')->with('success', 'Permohonan tidak diluluskan.');
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

        return view('excos.rumah-ibadat.senarai', compact('rumah_ibadat'));
    }

    public function papar_rumah_ibadat(Request $request){

        $rumah_ibadat = RumahIbadat::findorfail($request->rumah_ibadat_id);

        $permohonan = Permohonan::where('rumah_ibadat_id', $rumah_ibadat->id)->get();

        return view('excos.rumah-ibadat.papar', compact('rumah_ibadat', 'permohonan'));
    }
}
