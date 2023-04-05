<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Audit;
use App\Models\RumahIbadat;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Permohonan;
use App\Models\Peruntukan;
use App\Models\Csm;
use App\Models\SpecialApplication;

// use App\Notifications\Pengguna\PenggunaBaru;

use App\Jobs\Pengguna\PenggunaBaru;
use App\Models\Banner;
use App\Models\SoalanLazim;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function dashboard()
    {
        $counter_pemohon = User::where('role', '0')->count();
        $counter_pengguna = User::where('role','!=', '0')->count();
        $counter_rumah_ibadat = RumahIbadat::count();
        $counter_audit_log_access = Audit::where('event', 'Log Masuk')->orWhere('event', 'Log Keluar')->count();


        //laporan perbelanjaan
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
        // dd($annual_report);


        //permohonan terkini
        $new_application = Permohonan::where('yb_id', '!=', null)->where('exco_id', '!=', null)->where('status', '1')->orderBy('created_at', 'asc')->get();

        //================== LAPORAN PERBELANJAAN - TOKONG ==================

        $laporan_semua = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

        $special_application_pass = SpecialApplication::where('status', '2')->whereYear('created_at', date('Y'))->get();

        $khas_semua = collect($special_application_pass)->sum('requested_amount');

        $count_khas_semua = $special_application_pass->count();

        //================== LAPORAN PERBELANJAAN - TOKONG ==================

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

        //================== LAPORAN PERBELANJAAN - KUIL ==================

        $laporan_kuil = DB::select(DB::raw("SELECT t.tujuan AS tujuan, COUNT(t.tujuan) AS bilangan, SUM(t.peruntukan) AS peruntukan FROM tujuans t, permohonans p, rumah_ibadats r WHERE p.id = t.permohonan_id AND r.id = p.rumah_ibadat_id AND p.status = 2 AND r.category = 'KUIL' AND YEAR(p.created_at) = '$current_year' GROUP BY t.tujuan"));

        $total_peruntukan_kuil = 0.00;
        if($laporan_kuil){
            foreach($laporan_kuil as $data){
                $total_peruntukan_kuil += $data->peruntukan;
            }
        }

        $special_application_pass = SpecialApplication::where(
            'category',
            'KUIL'
        )->where('status', '2')->whereYear('created_at', date('Y'))->get();

        $khas_kuil = collect($special_application_pass)->sum('requested_amount');

        $total_kuil = $total_peruntukan_kuil + $khas_kuil;

        $count_khas_kuil = $special_application_pass->count();

        $balance_kuil = $annual_report->total_kuil - $total_kuil;

        //================== LAPORAN PERBELANJAAN - GURDWARA ==================

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

        $total_gurdwara = $total_peruntukan_gurdwara + $khas_gurdwara;

        $count_khas_gurdwara = $special_application_pass->count();

        $balance_gurdwara = $annual_report->total_gurdwara - $total_gurdwara;

        //================== LAPORAN PERBELANJAAN - GEREJA ==================

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

        $total_gereja = $total_peruntukan_gereja + $khas_gereja;

        $count_khas_gereja = $special_application_pass->count();

        $balance_gereja = $annual_report->total_gereja - $total_gereja;



        return view('admins.dashboard', compact('balance_tokong','balance_kuil','balance_gurdwara','balance_gereja','total_tokong','total_kuil','total_gurdwara','total_gereja','counter_pemohon', 'counter_pengguna', 'counter_rumah_ibadat', 'counter_audit_log_access','current_year', 'annual_report', 'laporan_semua', 'khas_semua', 'count_khas_semua', 'laporan_tokong', 'khas_tokong', 'count_khas_tokong', 'laporan_kuil', 'khas_kuil', 'count_khas_kuil', 'laporan_gurdwara', 'khas_gurdwara', 'count_khas_gurdwara', 'laporan_gereja', 'khas_gereja', 'count_khas_gereja', 'new_application'));
    }

    public function pengguna()
    {
        return view('admins.pengguna.pilih');
    }

    public function pemohon()
    {
        //get user that can apply rumah ibadat
        $pengguna = User::where('role', '0')->get();

        return view('admins.pengguna.pemohon', compact('pengguna'));
    }

    public function pemohon_change_status(Request $request){

        if($request->has('user_id_disable')){
            $user_id = $request->user_id_disable;
        }else{
            $user_id = $request->user_id_enable;
        }

        $user = User::findorfail($user_id);

        if($user->status == 0){
            $user->status = 1;
            $user->save();
            return redirect()->route('admins.pengguna.pemohon')->with('success', 'Pengguna telah diaktifkan.');
        }else{
            $user->status = 0;
            $user->save();
            return redirect()->route('admins.pengguna.pemohon')->with('success', 'Pengguna telah dinyaktif.');
        }
    }

    public function kemaskini_pemohon(Request $request){

        $user = User::findorfail($request->user_id);

        return view('admins.pengguna.kemaskini-pemohon', compact('user'));
    }

    public function kemaskini_pemohon_update(Request $request){
        // dd($request->all());

        // Validate change password form

        $this->validator($request->all())->validate();

        $user = User::findOrFail($request->user_id);

        if($request->ic_number != $user->ic_number){
            $checking_ic_number = User::where('ic_number', $request->ic_number)->count();

            if($checking_ic_number > 0){
                return redirect()->back()->with("error", "Kad pengenalan ini telah didaftarkan.");
            }
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->ic_number = $request->ic_number;

        $user->mobile_phone = $request->mobile_phone;

        $user->save();

        return redirect()->back()->with("success", "Profil pemohon berjaya dikemaskini.");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'ic_number' => ['required', 'string', 'min:12', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_phone' => ['required', 'string', 'max:11', 'min:10'],
        ]);
    }

    public function pengguna_dalaman()
    {
        //get user that canot apply rumah ibadat
        $pengguna = User::where('role', '!=', '0')->get();

        return view('admins.pengguna.pengguna-dalaman', compact('pengguna'));
    }

    public function pengguna_dalaman_change_status(Request $request){
        // dd($request->all());
        if ($request->has('user_id_disable')) {
            $user_id = $request->user_id_disable;
        } else {
            $user_id = $request->user_id_enable;
        }

        $user = User::findorfail($user_id);

        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna telah diaktifkan.');
        } else {
            $user->status = 0;
            $user->save();
            return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna telah dinyaktif.');
        }
    }

    public function pengguna_dalaman_daftar()
    {
        return view('admins.pengguna.daftar');
    }

    public function pengguna_dalaman_daftar_submit(Request $request){
        // dd($request->all());

        //check ic
        $ic_checker = User::where('ic_number', $request->ic_number)->count();

        if($ic_checker > 0){
            return redirect()->back()->with('error', 'Kad pengenalan telah didaftarkan.');
        }

        // $hashed_random_password = Hash::make("1234567890");

        $password = Str::random(10);

        $hashed_random_password = Hash::make($password) ;

        $user = User::create([
            'role' => $request->role,
            'status' => "1",
            'is_firstime' => "1",
            'is_rumah_ibadat' => "0",
            'name' => $request->name,
            'email' => $request->email,
            'ic_number' => $request->ic_number,
            'mobile_phone' => $request->phone,
            'password' => $hashed_random_password,

        ]);

        if($request->role == 1 || $request->role == 2){
            $checking_user_role = UserRole::where('user_id', $user->id)->count();

            $tokong = 0;
            $kuil = 0;
            $gurdwara = 0;
            $gereja = 0;

            foreach($request->rumah_ibadat as $data){
                if($data == "tokong"){
                    $tokong = 1;
                }

                if ($data == "kuil") {
                    $kuil = 1;
                }

                if ($data == "gurdwara") {
                    $gurdwara = 1;
                }

                if ($data == "gereja") {
                    $gereja = 1;
                }
            }


            if($checking_user_role == 0){ //create new user_role

                $user_role = UserRole::create([
                    'user_id' => $user->id,

                    'tokong' => $tokong,
                    'kuil' => $kuil,
                    'gurdwara' => $gurdwara,
                    'gereja' => $gereja,
                ]);
            }



        }

        // $user->notify(new PenggunaBaru($hashed_random_password));
        $emailJob = (new PenggunaBaru($user, $password))->delay(now()->addSeconds(1));
        dispatch($emailJob);

        return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Pengguna berjaya didaftar.');
    }

    public function kemaskini_maklumat(Request $request){

        $user = User::findorfail($request->user_id);

        return view('admins.pengguna.kemaskini-dalaman', compact('user'));
    }

    public function kemaskini_maklumat_update(Request $request){
        // dd($request->all());

        $user = User::findorfail($request->user_id);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->ic_number = $request->ic_number;

        $user->mobile_phone = $request->phone;

        $user->role = $request->role;

        $user->save();

        if ($request->role == 1 || $request->role == 2) {
            $checking_user_role = UserRole::where('user_id', $user->id)->count();

            $tokong = 0;
            $kuil = 0;
            $gurdwara = 0;
            $gereja = 0;

            foreach ($request->rumah_ibadat as $data) {
                if ($data == "tokong") {
                    $tokong = 1;
                }

                if ($data == "kuil") {
                    $kuil = 1;
                }

                if ($data == "gurdwara") {
                    $gurdwara = 1;
                }

                if ($data == "gereja") {
                    $gereja = 1;
                }
            }


            if ($checking_user_role == 0) { //create new user_role

                $user = UserRole::create([
                    'user_id' => $user->id,

                    'tokong' => $tokong,
                    'kuil' => $kuil,
                    'gurdwara' => $gurdwara,
                    'gereja' => $gereja,
                ]);
            }else{
                $user_role = UserRole::where('user_id', $user->id)->first();

                $user_role->tokong = $tokong;
                $user_role->kuil = $kuil;
                $user_role->gurdwara = $gurdwara;
                $user_role->gereja = $gereja;

                $user_role->save();
            }
        }

        return redirect()->route('admins.pengguna.pengguna-dalaman')->with('success', 'Maklumat pengguna telah dikemaskini.');
    }

    public function rumah_ibadat(){
        return view('admins.rumah-ibadat.pilih');
    }

    public function senarai_rumah_ibadat()
    {
        $rumah_ibadat = RumahIbadat::get();
        return view('admins.rumah-ibadat.senarai', compact('rumah_ibadat'));
    }

    public function senarai_rumah_ibadat_papar(Request $request){

        $rumah_ibadat = RumahIbadat::findorfail($request->rumah_ibadat_id);

        return view('admins.rumah-ibadat.papar', compact('rumah_ibadat'));
    }

    public function update_rumah_ibadat(Request $request){
        // dd($request->all());
        //fetch user's rumah ibadat
        $rumah_ibadat = RumahIbadat::findorfail($request->rumah_ibadat_id);

        //unique validator for name
        if ($request->name_association != $rumah_ibadat->name_association) { //cheking either rumah ibadat name has been changed or not

            //checking rumah ibadat name either been registered or not
            $checkName = RumahIbadat::where('name_association', $request->name_association)->count();

            if ($checkName > 0) { //if the name exist, return back and display error message
                return redirect()->back()->with('error', 'Nama Rumah Ibadat ini telah didaftar.');
            }
        }

        //unique validator for registration number
        if ($request->registration_number != $rumah_ibadat->registration_number) { //cheking either ros number has been changed or not

            //checking registration number either been registered or not
            $checkRegistraionNumber = RumahIbadat::where('registration_number', $request->registration_number)->count();

            if ($checkRegistraionNumber > 0) { //if the ros number exist, return back and display error message
                return redirect()->back()->with('error', 'Nombor pendaftaran ini telah didaftar.');
            }
        }

        //unique validator for account number
        if ($request->bank_account != $rumah_ibadat->bank_account) { //cheking either account number has been changed or not

            //checking account number either been registered or not
            $checkAccountNumber = RumahIbadat::where('bank_account', $request->bank_account)->count();

            if ($checkAccountNumber > 0) { //if the ros number exist, return back and display error message
                return redirect()->back()->with('error', 'Nombor akaun ini telah didaftar.');
            }
        }

        //update validator
        $this->validatorUpdate($request->all())->validate();

        //validate the if user category is gereja and registration type is induk
        if ($request->category != "GEREJA" && $request->registration_type == "INDUK") {
            $this->validatorNonGereja($request->all())->validate();
        }

        //update information
        $rumah_ibadat->category = $request->category;
        $rumah_ibadat->name_association = $request->name_association;
        $rumah_ibadat->office_phone = $request->office_phone;
        $rumah_ibadat->name_association_bank = $request->name_association_bank;

        $rumah_ibadat->registration_type = $request->registration_type;
        $rumah_ibadat->name_association_main = $request->name_association_main;
        $rumah_ibadat->registration_number = $request->registration_number;

        $rumah_ibadat->address = $request->address;
        $rumah_ibadat->postcode = $request->postcode;
        $rumah_ibadat->district = $request->district;
        $rumah_ibadat->state = $request->state;
        $rumah_ibadat->pbt_area = $request->pbt_area;

        $rumah_ibadat->bank_name = $request->bank_name;
        $rumah_ibadat->bank_account = $request->bank_account;

        //save information
        $rumah_ibadat->save();

        return redirect()->back()->with("success", "Maklumat rumah ibadat pemohon berjaya dikemaskini.");

    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'category' => ['required', 'string'],
            'name_association' => ['required', 'string', 'max:255'],
            'office_phone' => ['nullable', 'string', 'min:10', 'max:11'],
            'name_association_bank' => ['required', 'string', 'max:255'],

            'registration_type' => ['required'],
            'registration_number' => ['required', 'string'],

            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:5', 'min:5'],
            'district' => ['required', 'string', 'max:255'],
            'pbt_area' => ['required', 'string', 'max:255'],

            'bank_name' => ['required', 'string'],
            'bank_account' => ['required', 'string'],
        ]);
    }

    protected function validatorNonGereja(array $data)
    {
        return Validator::make($data, [
            'registration_number_main' => ['required', 'string', 'max:255'],
        ]);
    }

    public function tetapan(){
        return view('admins.tetapan.pilih');
    }

    public function halaman_utama(){
        $csm = Csm::get()->first();
        $banner = Banner::where('status', '1')->get();

        // $banner = $banner->order_by('created_at', 'desc');
        return view('admins.tetapan.kemaskini-halaman-utama', compact('csm', 'banner'));
    }

    public function halaman_utama_submit(Request $request){
        // dd($request->all());

        //remove image
        if ($request->remove_image != null) {

            foreach($request->remove_image as $id){
                $banner = Banner::findorfail($id);
                $banner->status = 0;
                $banner->save();
            }

        }
        //upload gambar
        if($request->photos != null){

            $allowedfileExtension = ['jpeg', 'jpg', 'png'];

            $filename = $request->photos->getClientOriginalName();
            $extension = $request->photos->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if($check){
                //upload photo
                $banner_uploaded = $request->file('photos')->store('public/muat-naik/banner/');
                Banner::create([
                    'name_file' => $filename,
                    'comment' => null,
                    'url' => $banner_uploaded,
                    'status' => 1,
                ]);
            }

        }

        $content = Csm::get()->first();

        $content->intro_title = $request->intro_title;
        $content->intro_content = $request->intro_content;

        $content->upen_email = $request->upen_email;
        $content->upen_contact = $request->upen_contact;
        $content->upen_address = $request->address;

        $content->yb1_name = $request->yb1_name;
        $content->yb1_email = $request->yb1_email;
        $content->yb1_contact = $request->yb1_contact;

        $content->yb2_name = $request->yb2_name;
        $content->yb2_email = $request->yb2_email;
        $content->yb2_contact = $request->yb2_contact;

        $content->yb3_name = $request->yb3_name;
        $content->yb3_email = $request->yb3_email;
        $content->yb3_contact = $request->yb3_contact;

        $content->save();

        return redirect()->back()->with("success", "Halaman Utama berjaya dikemaskini.");
    }

    public function soalan_lazim(){

        $soalan = SoalanLazim::get();

        return view('admins.tetapan.kemaskini-soalan-lazim', compact('soalan'));
    }

    public function submit_soalan_lazim(Request $request){

        $soalan = SoalanLazim::create([
            'soalan' => $request->soalan,
            'jawapan' => $request->jawapan,
            'status' => 1,
        ]);

        return redirect()->back()->with("success", "Soalan lazim berjaya ditambah");
    }

    public function padam_soalan_lazim(Request $request){

        $soalan = SoalanLazim::findorfail($request->soalan_id);
        $soalan->delete();

        return redirect()->back()->with("success", "Soalan berjaya dipadam.");
    }

    public function audit_trail()
    {
        return view('admins.audit-trail.pilih');
    }

    public function audit_trail_process(){
        // dd("papar audit trail proses");

        $audit_process = Audit::where('event', '!=', 'Log Masuk')->where('event', '!=', 'Log Keluar')->get();

        return view('admins.audit-trail.proses', compact('audit_process'));
    }

    public function audit_trail_log_user(){
        $audit_log_user = Audit::where('event', 'Log Masuk')->orWhere('event', 'Log Keluar')->get();


        return view('admins.audit-trail.log-user', compact('audit_log_user'));
    }
}
