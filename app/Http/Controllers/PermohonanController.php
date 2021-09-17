<?php

namespace App\Http\Controllers;

use Storage;

use App\Models\User;

use App\Models\RumahIbadat;

use App\Models\Permohonan;

use App\Models\Tujuan;

use App\Models\Lampiran;

use App\Models\Batch;
use App\Notifications\Permohonan\PermohonanCreated;
use App\Notifications\Permohonan\CancelApplication;
use App\Notifications\Permohonan\SubmitSemakSemula;

use Illuminate\Http\Request;

class PermohonanController extends Controller
{

    public function pilih_permohonan()
    {
        return view('users.permohonan.pilih');
    }

    public function permohonan_baru()
    {
        $batch = Batch::first();

        if ($batch->allow_permohonan == 0) {
            return redirect()->back()->with('error', 'Maaf, permohonan telah ditutup');
        }



        //============================== 1 year 1 application checker ===========================================
        $current_year = date('Y'); //get current date

        $rumah_ibadat = RumahIbadat::where('user_id', auth()->user()->id)->first();

        $lulus_checker = Permohonan::where('rumah_ibadat_id', $rumah_ibadat->id)->where('status', '2')->whereYear('created_at', date('Y'))->count();

        $sedang_diproses_checker = Permohonan::where('rumah_ibadat_id', $rumah_ibadat->id)->where('status', '1')->whereYear('created_at', date('Y'))->count();

        $semak_semula_checker = Permohonan::where('rumah_ibadat_id', $rumah_ibadat->id)->where('status', '0')->whereYear('created_at', date('Y'))->count();

        if ($lulus_checker > 0 || $sedang_diproses_checker > 0 || $semak_semula_checker > 0) {
            return redirect()->back()->with('error', 'Maaf, anda telah membuat permohonan untuk tahun ini.');
        }

        //============================== 1 year 1 application checker ===========================================



        $user_id = auth()->user()->id;
        $rumah_ibadat = RumahIbadat::where('user_id', $user_id)->get()->first();

        $rumah_ibadat_checker = RumahIbadat::where('user_id', $user_id)->count();

        if ($rumah_ibadat_checker == 0) {
            return redirect()->back()->with('error', 'Sila daftar rumah ibadat untuk membuat permohonan');
        }
        return view('users.permohonan.baru', compact('rumah_ibadat'));
    }

    public function reference_number()
    {
        $year = substr(date('Y'), -2);
        $month = date('m');
        $date = date('d');
        $random = mt_rand(0, 9999); // better than rand()
        $reference_number = $year . $month . $date . $random;

        //CHECK EITHER EXIST OR NOT
        $reference_number_checker = Permohonan::where('reference_number', $reference_number)->count();
        if ($reference_number_checker != 0) {
            return $this->reference_number();
        }

        return $reference_number;
    }

    public function permohonan_hantar(Request $request)
    {

        // dd($request->all());

        //======================================================= FETCH DATA =======================================================

        $user_id = auth()->user()->id;  //find user id
        $rumah_ibadat = RumahIbadat::where('user_id', $user_id)->get()->first(); //find current user rumah ibadat
        $current_date = date('d-m-Y'); //get current date

        //======================================================= END OF FETCH DATA =======================================================


        //======================================================= UPLOAD DOCUMENT LAMPIRAN =======================================================

        $application_letter = $request->file('application_letter')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
        $registration_certificate = $request->file('registration_certificate')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);  // required
        $account_statement = $request->file('account_statement')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);   // required

        $spending_statement = null;
        $support_letter = null;
        $committee_member = null;
        $certificate_or_letter_temple = null;
        $invitation_letter = null;

        if ($request->category == "KUIL" || $request->category == "GURDWARA") {
            $spending_statement = $request->file('spending_statement')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
            $support_letter = $request->file('support_letter')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required

            if ($request->file('committee_member') != null) { //not required
                $committee_member = $request->file('committee_member')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }

            if ($request->file('certificate_or_letter_temple') != null) { //not required
                $certificate_or_letter_temple = $request->file('certificate_or_letter_temple')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }

            if ($request->file('invitation_letter') != null) { //not required
                $invitation_letter = $request->file('invitation_letter')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }
        }

        //======================================================= END OF UPLOAD DOCUMENT LAMPIRAN =======================================================


        //======================================================= CREATE PERMOHONAN =======================================================

        $reference_number = $this->reference_number(); //generate reference number

        $permohonan = Permohonan::create([
            'reference_number' => $reference_number,

            'rumah_ibadat_id' => $rumah_ibadat->id,
            'user_id' => $user_id,
            'application_letter' => $application_letter,
            'registration_certificate' => $registration_certificate,
            'account_statement' => $account_statement,

            'spending_statement' => $spending_statement,
            'support_letter' => $support_letter,
            'committee_member' => $committee_member,
            'certificate_or_letter_temple' => $certificate_or_letter_temple,
            'invitation_letter' => $invitation_letter,
        ]);

        //======================================================= END OF CREATE PERMOHONAN =======================================================


        //======================================================= CREATE TUJUAN AND LAMPIRAN =======================================================

        foreach ($request->tujuan as $data) {
            $tujuan = Tujuan::create([
                'permohonan_id' => $permohonan->id,
                'tujuan' => $data,
            ]);

            if ($data == "AKTIVITI KEAGAMAAN") {  //-------------------- OPTION 1 --------------------

                $files_opt_1_photo = $request->file('opt_1_photo');
                foreach ($files_opt_1_photo as $opt_1_photo) {

                    $file_type = $opt_1_photo->extension();
                    $saved_photo_url = $opt_1_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_1_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data == "PENDIDIKAN KEAGAMAAN") { //-------------------- OPTION 2 --------------------

                $saved_photo_url = $request->file('opt_2_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_2_file_1')->extension();
                $descripton = "opt_2_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $tujuan->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);
            } elseif ($data == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN") { //-------------------- OPTION 3 --------------------

                //save file
                $saved_photo_url = $request->file('opt_3_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_3_file_1')->extension();
                $descripton = "opt_3_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $tujuan->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);


                //save images
                $files_opt_3_photo = $request->file('opt_3_photo');
                foreach ($files_opt_3_photo as $opt_3_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_3_photo->extension();
                    $saved_photo_url = $opt_3_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_3_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data == "BAIK PULIH/PENYELENGGARAAN BANGUNAN") { //-------------------- OPTION 4 --------------------

                //save file
                $saved_photo_url = $request->file('opt_4_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_4_file_1')->extension();
                $descripton = "opt_4_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $tujuan->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                //save image 1
                $files_opt_4_photo = $request->file('opt_4_photo');
                foreach ($files_opt_4_photo as $opt_4_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_4_photo->extension();
                    $saved_photo_url = $opt_4_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_4_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }

                //save image 2
                $files_opt_4_2_photo = $request->file('opt_4_2_photo');
                foreach ($files_opt_4_2_photo as $opt_4_2_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_4_2_photo->extension();
                    $saved_photo_url = $opt_4_2_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_4_2_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT") { //-------------------- OPTION 5 --------------------

                //save file 1
                $saved_photo_url = $request->file('opt_5_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_5_file_1')->extension();
                $descripton = "opt_5_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $tujuan->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                //save file 2
                if ($request->hasFile('opt_5_file_2')) { // not required
                    $saved_photo_url = $request->file('opt_5_file_2')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                    $file_type = $request->file('opt_5_file_2')->extension();
                    $descripton = "opt_5_file_2";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }


                //save file 3
                $saved_photo_url = $request->file('opt_5_file_3')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_5_file_3')->extension();
                $descripton = "opt_5_file_3";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $tujuan->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                if ($request->hasFile('opt_5_photo')) { // not required for GEREJA
                    //save image 1
                    $files_opt_5_photo = $request->file('opt_5_photo');
                    foreach ($files_opt_5_photo as $opt_5_photo) {

                        // dd($opt_3_photo);
                        $file_type = $opt_5_photo->extension();
                        $saved_photo_url = $opt_5_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                        $descripton = "opt_5_photo";

                        $lampiran = Lampiran::create([
                            'tujuan_id' => $tujuan->id,
                            'file_type' => $file_type,
                            'url' => $saved_photo_url,
                            'description' => $descripton,
                        ]);
                    }
                }
            }
        }

        //======================================================= END OF CREATE TUJUAN AND LAMPIRAN =======================================================


        //======================================================= SEND NOTIFICATION EMAIL =======================================================


        $permohonan->notify(new PermohonanCreated()); // send email notification to pemohon

        $message = "Permohonan berjaya  .";

        // app('App\Http\Controllers\ApiController')->sendMessage($permohonan, $message);

        //======================================================= END OF SEND NOTIFICATION EMAIL =======================================================


        //======================================================= SUCCESSFULL AND REDIRECT =======================================================

        return redirect()->route('users.permohonan.sedang-diproses')->with('success', 'Permohonan anda berjaya dihantar.');

        //======================================================= END OF SUCCESSFULL AND REDIRECT =======================================================
    }

    public function permohonan_proses()
    {

        //GET 'PERMOHONAN SEDANG DIPROSES' LIST
        $prosessing_application = Permohonan::where('rumah_ibadat_id', auth()->user()->rumah_ibadat->id )->where('status', '1')->orWhere('status', '0')->get();

        return view('users.permohonan.sedang-diproses', compact('prosessing_application'));
    }

    public function batal_permohonan(Request $request)
    {

        $permohonan = Permohonan::findorfail($request->permohonan_id_batal);
        $permohonan->status = 4;
        $permohonan->save();

        $permohonan->notify(new CancelApplication());

        return redirect()->route('users.permohonan.tidak-lulus')->with('success', 'Permohonan anda berjaya dibatalkan.');
    }

    public function papar_permohonan_sedang_diproses(Request $request)
    {
        // dd($request->all());

        $permohonan = Permohonan::findorfail($request->permohonan_id);

        return view('users.permohonan.papar-sedang-diproses', compact('permohonan'));
    }

    public function permohonan_semakan_semula(Request $request)
    {
        // dd($request->all());

        $permohonan = Permohonan::findorfail($request->permohonan_id);

        return view('users.permohonan.semak-semula', compact('permohonan'));
    }

    public function hantar_permohonan_semakan_semula(Request $request)
    {
        // dd($request->all());

        $permohonan = Permohonan::findorfail($request->permohonan_id); // find current permohonan
        $user_id = auth()->user()->id;  //find user id

        $permohonan->notify(new SubmitSemakSemula());

        $rumah_ibadat = RumahIbadat::where('user_id', $user_id)->get()->first(); //find current user rumah ibadat
        $current_date = date('d-m-Y'); //get current date

        //======================================================= UPLOAD DOCUMENT LAMPIRAN AND UPDATE PERMOHONAN =======================================================

        if ($request->application_letter) {
            $application_letter = $request->file('application_letter')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            $permohonan->application_letter = $application_letter;
        }

        if ($request->registration_certificate) {
            $registration_certificate = $request->file('registration_certificate')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            $permohonan->registration_certificate = $registration_certificate;
        }

        if ($request->account_statement) {
            $account_statement = $request->file('account_statement')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            $permohonan->account_statement = $account_statement;
        }

        if ($request->category == "KUIL" || $request->category == "GURDWARA") {

            if ($request->spending_statement) {
                $spending_statement = $request->file('spending_statement')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $permohonan->spending_statement = $spending_statement;
            }

            if ($request->application_letter) {
                $support_letter = $request->file('support_letter')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $permohonan->support_letter = $support_letter;
            }
        }

        $permohonan->review_to_applicant_id = null;

        $permohonan->status = 1; //update status permohonan

        $permohonan->save(); //save permohonan

        //======================================================= END OF UPLOAD DOCUMENT LAMPIRAN AND UPDATE PERMOHONAN =======================================================


        //======================================================= CREATE TUJUAN AND LAMPIRAN =======================================================

        foreach ($permohonan->tujuan as $data) {
            // dd($data);
            if ($data->tujuan == "AKTIVITI KEAGAMAAN" && $data->status == 2) {  //-------------------- OPTION 1 --------------------

                //update status tujuan
                $data->status = 2;
                $data->save();

                $files_opt_1_photo = $request->file('opt_1_photo');
                foreach ($files_opt_1_photo as $opt_1_photo) {

                    $file_type = $opt_1_photo->extension();
                    $saved_photo_url = $opt_1_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_1_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $data->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data->tujuan == "PENDIDIKAN KEAGAMAAN" && $data->status == 2) { //-------------------- OPTION 2 --------------------
                //update status tujuan
                $data->status = 2;
                $data->save();

                $saved_photo_url = $request->file('opt_2_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_2_file_1')->extension();
                $descripton = "opt_2_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $data->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);
            } elseif ($data->tujuan == "PEMBELIAN PERALATAN UNTUK KELAS KEAGAMAAN" && $data->status == 2) { //-------------------- OPTION 3 --------------------

                //update status tujuan
                $data->status = 2;
                $data->save();

                //save file
                $saved_photo_url = $request->file('opt_3_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_3_file_1')->extension();
                $descripton = "opt_3_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $data->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);


                //save images
                $files_opt_3_photo = $request->file('opt_3_photo');
                foreach ($files_opt_3_photo as $opt_3_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_3_photo->extension();
                    $saved_photo_url = $opt_3_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_3_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $data->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data->tujuan == "BAIK PULIH/PENYELENGGARAAN BANGUNAN" && $data->status == 2) { //-------------------- OPTION 4 --------------------

                //update status tujuan
                $data->status = 2;
                $data->save();

                //save file
                $saved_photo_url = $request->file('opt_4_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_4_file_1')->extension();
                $descripton = "opt_4_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $data->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                //save image 1
                $files_opt_4_photo = $request->file('opt_4_photo');
                foreach ($files_opt_4_photo as $opt_4_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_4_photo->extension();
                    $saved_photo_url = $opt_4_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_4_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $data->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }

                //save image 2
                $files_opt_4_2_photo = $request->file('opt_4_2_photo');
                foreach ($files_opt_4_2_photo as $opt_4_2_photo) {

                    // dd($opt_3_photo);
                    $file_type = $opt_4_2_photo->extension();
                    $saved_photo_url = $opt_4_2_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_4_2_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $data->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }
            } elseif ($data->tujuan == "PEMINDAHAN/PEMBINAAN BARU RUMAH IBADAT" && $data->status == 2) { //-------------------- OPTION 5 --------------------

                //update status tujuan
                $data->status = 2;
                $data->save();

                //save file 1
                $saved_photo_url = $request->file('opt_5_file_1')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_5_file_1')->extension();
                $descripton = "opt_5_file_1";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $data->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                //save file 2
                if ($request->hasFile('opt_5_file_2')) { // not required
                    $saved_photo_url = $request->file('opt_5_file_2')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                    $file_type = $request->file('opt_5_file_2')->extension();
                    $descripton = "opt_5_file_2";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $data->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }


                //save file 3
                $saved_photo_url = $request->file('opt_5_file_3')->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
                $file_type = $request->file('opt_5_file_3')->extension();
                $descripton = "opt_5_file_3";

                $lampiran = Lampiran::create([
                    'tujuan_id' => $data->id,
                    'file_type' => $file_type,
                    'url' => $saved_photo_url,
                    'description' => $descripton,
                ]);

                if ($request->hasFile('opt_5_photo')) { // not required for GEREJA
                    //save image 1
                    $files_opt_5_photo = $request->file('opt_5_photo');
                    foreach ($files_opt_5_photo as $opt_5_photo) {

                        // dd($opt_3_photo);
                        $file_type = $opt_5_photo->extension();
                        $saved_photo_url = $opt_5_photo->store('public/muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                        $descripton = "opt_5_photo";

                        $lampiran = Lampiran::create([
                            'tujuan_id' => $data->id,
                            'file_type' => $file_type,
                            'url' => $saved_photo_url,
                            'description' => $descripton,
                        ]);
                    }
                }
            }
        }

        //======================================================= END OF CREATE TUJUAN AND LAMPIRAN =======================================================


        //======================================================= SUCCESSFULL AND REDIRECT =======================================================

        return redirect()->route('users.permohonan.sedang-diproses')->with('success', 'Permohonan anda berjaya dihantar.');

        //======================================================= END OF SUCCESSFULL AND REDIRECT =======================================================
    }

    public function permohonan_lulus()
    {
        //GET 'PERMOHONAN LULUS' LIST
        $passed_application = Permohonan::where('user_id', auth()->user()->id)->where('status', '2')->get();

        return view('users.permohonan.lulus', compact('passed_application'));
    }

    public function permohonan_tidak_lulus()
    {
        //GET 'PERMOHONAN TIDAK LULUS' LIST
        // $failed_application = Permohonan::where('user_id', auth()->user()->id )->where('status', '4')->orWhere('status', '4')->get();

        $failed_application = Permohonan::where('user_id', auth()->user()->id)->where(
                function ($query) {
                    $query->where('status', '3')
                        ->orWhere('status', '4');
                }
            )->get();

        return view('users.permohonan.tidak-lulus', compact('failed_application'));
    }
}
