<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use App\Models\RumahIbadat;
use App\Models\Permohonan;
use App\Models\Tujuan;
use App\Models\Lampiran;
use App\Models\Peruntukan;
use App\Models\SpecialApplication;
use Illuminate\Http\Request;

class UpenController extends Controller
{
    public function dashboard()
    {
        //counter
        $count_new_application = Permohonan::where('yb_id','!=', null)->where('exco_id', '!=', null)->where('status', '1')->count();
        $count_review_application = Permohonan::where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '0')->count();
        $count_passed_application = Permohonan::where('status', '2')->count();
        $count_failed_application = Permohonan::where('status', '3')->orWhere('status', '4')->count();

        //laporan perbelanjaan
        $current_year = date('Y'); //get current date
        $annual_report = Peruntukan::whereYear('created_at', $current_year)->first();
        // dd($annual_report);
 

        //permohonan terkini
        $new_application = Permohonan::where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->orderBy('created_at', 'asc')->get();


        return view('upens.dashboard', compact('count_new_application', 'count_review_application', 'count_passed_application', 'count_failed_application', 'annual_report', 'new_application')); 
    }

    public function permohonan()
    {
        return view('upens.permohonan.pilih');
    }

    public function permohonan_baru(){

        $permohonan = Permohonan::where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->get();

        return view('upens.permohonan.baru', compact('permohonan'));
    }

    public function papar_permohonan(Request $request)
    {
        $permohonan = Permohonan::findOrFail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = User::findorfail($permohonan->yb_id);

        return view('upens.permohonan.papar', compact('permohonan', 'exco','yb'));
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
        return redirect()->route('upens.permohonan.baru')->with('success', 'Status permohonan telah dikemaskini.');
    }

    public function permohonan_pembatalan(Request $request)
    {
        //find current permohonan
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        //update status permohonan
        $permohonan->not_approved_id = auth()->user()->id;
        $permohonan->status = 3;
        $permohonan->save();

        return redirect()->route('upens.permohonan.baru')->with('success', 'Permohonan telah tidak diluluskan.');
    }

    public function permohonan_pengesahan(Request $request)
    {
        $user_id = auth()->user()->id; //current user id
        $current_date = date('Y-m-d H:i:s'); //get current date
        $permohonan = Permohonan::findorfail($request->permohonan_id); //look current permohonan

        //update permohonan
        $permohonan->upen_id = $user_id;
        $permohonan->upen_date_time = $current_date;
        $permohonan->status = 2; //approve application

        $permohonan->save();

        //fund calculation
        $current_year = date('Y'); //get current date
        $peruntukan = Peruntukan::whereYear('created_at', $current_year)->first();
        $peruntukan->current_fund = $peruntukan->current_fund + $permohonan->total_fund;
        $peruntukan->balance_fund = $peruntukan->total_fund - $peruntukan->current_fund;


        if($permohonan->rumah_ibadat->category == "TOKONG"){

            $peruntukan->current_tokong = $peruntukan->current_tokong + $permohonan->total_fund;
            $peruntukan->balance_tokong = $peruntukan->total_tokong - $peruntukan->current_tokong;

        } elseif($permohonan->rumah_ibadat->category == "KUIL"){

            $peruntukan->current_kuil = $peruntukan->current_kuil + $permohonan->total_fund;
            $peruntukan->balance_kuil = $peruntukan->total_kuil - $peruntukan->current_kuil;

        } elseif ($permohonan->rumah_ibadat->category == "GURDWARA") {

            $peruntukan->current_gurdwara = $peruntukan->current_gurdwara + $permohonan->total_fund;
            $peruntukan->balance_gurdwara = $peruntukan->total_gurdwara- $peruntukan->current_gurdwara;

        } elseif ($permohonan->rumah_ibadat->category == "GEREJA") {

            $peruntukan->current_gereja = $peruntukan->current_gereja + $permohonan->total_fund;
            $peruntukan->balance_gereja = $peruntukan->total_gereja - $peruntukan->current_gereja;

        }

        $peruntukan->save();
        

        //redirect
        return redirect()->route('upens.permohonan.baru')->with('success', 'Status permohonan telah diluluskan.');
    }

    public function permohonan_semak_semula_list()
    {
        $review_application = Permohonan::where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '0')->get();
        return view('upens.permohonan.semak-semula', compact('review_application'));
    }

    public function papar_permohonan_semakan_semula(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $user_in_charge = User::findorfail($permohonan->review_to_applicant_id);

        return view('upens.permohonan.papar-semak-semula', compact('permohonan', 'user_in_charge'));
    }

    public function permohonan_lulus(){
        $approved_application = Permohonan::where('status', '2')->get();

        return view('upens.permohonan.lulus', compact('approved_application'));
    }

    public function papar_permohonan_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = User::findorfail($permohonan->exco_id);

        $yb = User::findorfail($permohonan->yb_id);

        $upen = User::findorfail($permohonan->upen_id);

        return view('upens.permohonan.papar-lulus', compact('permohonan', 'exco', 'yb', 'upen'));
    }

    public function permohonan_tidak_lulus(){
        $rejected_application = Permohonan::where('status', '3')->orWhere('status', '4')->get();

        return view('upens.permohonan.tidak-lulus', compact('rejected_application'));
    }

    public function papar_permohonan_tidak_lulus(Request $request)
    {
        $permohonan = Permohonan::findorfail($request->permohonan_id);

        $exco = null;
        if ($permohonan->status == 3) {
            $exco = User::findorfail($permohonan->not_approved_id);
        }

        return view('upens.permohonan.papar-tidak-lulus', compact('permohonan', 'exco'));
    }

    public function permohonan_khas()
    {
        return view('upens.permohonan.permohonan-khas.baru');
    }

    public function reference_number()
    {
        $year = substr(date('Y'), -2);
        $month = date('m');
        $date = date('d');
        $random = mt_rand(0, 9999); // better than rand()
        $reference_number = $year . $month . $date . $random;

        //CHECK EITHER EXIST OR NOT
        $reference_number_checker = SpecialApplication::where('reference_number', $reference_number)->count();
        if ($reference_number_checker != 0) {
            return $this->reference_number();
        }

        return $reference_number;
    }

    public function permohonan_khas_hantar(Request $request){
        // dd($request->all());
        $user_id = auth()->user()->id;  //find user id
        $current_date = date('d-m-Y'); //get current date

        $lampiran_1 = null;
        if ($request->file('lampiran_1') != null) { //not required
            $lampiran_1 = $request->file('lampiran_1')->store('public/muat-naik/permohonan-khas/' . $current_date);
        }

        $lampiran_2 = null;
        if ($request->file('lampiran_2') != null) { //not required
            $lampiran_2 = $request->file('lampiran_2')->store('public/muat-naik/permohonan-khas/' . $current_date);
        }

        $permohonan = SpecialApplication::create([
            'user_id' => $user_id,

            'reference_number' => $this->reference_number(),
            'status' => 1,
            'category' => $request->category,

            'purpose' => $request->purpose,
            'supported_document_1' => $lampiran_1,
            'supported_document_2' => $lampiran_2,
            'requested_amount' => $request->requested_amount,
        ]);

        // return redirect()->route('upens.dashboard')->with('success', 'Permohonan Khas berjaya dihantar.');
        return redirect()->route('upens.permohonan-khas.senarai')->with('success', 'Permohonan Khas berjaya dihantar.');

    }

    public function permohonan_khas_senarai()
    {
        // dd("masuk");

        $permohonan_khas = SpecialApplication::get();
        // dd($permohonan_khas);

        return view('upens.permohonan.permohonan-khas.senarai', compact('permohonan_khas'));
    }

    public function permohonan_khas_papar(Request $request){

        $special_application = SpecialApplication::findorfail($request->permohonan_khas_id);

        $exco = null;
        if ($special_application->exco_id != null) {
            $exco = User::findorfail($special_application->exco_id);
        }

        $yb = null;
        if($special_application->yb_id != null){
            $yb = User::findorfail($special_application->yb_id);
        }

        $cancel = null;
        if ($special_application->not_approved_id != null) {
            $cancel = User::findorfail($special_application->not_approved_id);
        }

        return view('upens.permohonan.permohonan-khas.papar', compact('special_application', 'exco', 'yb', 'cancel'));
    }

    public function tetapan()
    {

        return view('upens.tetapan.pilih');
    }

    public function tetapan_permohonan()
    {
        $batch = Batch::first();

        $user = null;
        if($batch->allowed_user_id != null){
            $user = User::findorfail($batch->allowed_user_id);
        }

        return view('upens.tetapan.permohonan', compact('batch', 'user'));
    }

    public function allow_permohonan(){
        $batch = Batch::first();

        if($batch->allow_permohonan == 1){
            $batch->allow_permohonan = 0;
            $batch->allowed_user_id = auth()->user()->id;
            $batch->save();
            return redirect()->route('upens.tetapan.permohonan')->with('success', 'Permohonan telah ditutup.');
        }else{
            $batch->allow_permohonan = 1;
            $batch->allowed_user_id = auth()->user()->id;
            $batch->save();
            return redirect()->route('upens.tetapan.permohonan')->with('success', 'Permohonan telah dibuka.');
        }
    }

    public function reset_batch(){
        $batch = Batch::first();

        $batch->allow_permohonan = 0; //tutup permohonan
        $batch->allowed_user_id = auth()->user()->id;

        $batch->tokong_counter = 0;
        $batch->tokong = 1;

        $batch->kuil_counter = 0;
        $batch->kuil = 1;

        $batch->gurdwara_counter = 0;
        $batch->gurdwara = 1;

        $batch->gereja_counter = 0;
        $batch->gereja = 1;

        $batch->save();

        return redirect()->route('upens.tetapan.permohonan')->with('success', 'Batch telah ditetapkan semula');
    }
}
