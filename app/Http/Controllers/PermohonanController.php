<?php

namespace App\Http\Controllers;

use Storage;

use App\Models\User;

use App\Models\RumahIbadat;

use App\Models\Permohonan;

use App\Models\Tujuan;

use App\Models\Lampiran;

use Illuminate\Http\Request;

class PermohonanController extends Controller
{

    public function pilih_permohonan()
    {
        return view('users.permohonan.pilih');
    }

    public function permohonan_baru()
    {   
        $user_id = auth()->user()->id;
        $rumah_ibadat = RumahIbadat::where('user_id', $user_id )->get()->first();

        $rumah_ibadat_checker = RumahIbadat::where('user_id', $user_id)->count();

        if($rumah_ibadat_checker == 0){
            return redirect()->back()->with('error', 'Sila daftar rumah ibadat untuk membuat permohonan');
        }
        return view('users.permohonan.baru', compact('rumah_ibadat'));
    }

    public function permohonan_hantar(Request $request){
        // dd($request->all());

        //======================================================= FETCH DATA =======================================================

        $user_id = auth()->user()->id;  //find user id
        $rumah_ibadat = RumahIbadat::where('user_id', $user_id)->get()->first(); //find current user rumah ibadat
        $current_date = date('d-m-Y'); //get current date

        //======================================================= END OF FETCH DATA =======================================================


        //======================================================= UPLOAD DOCUMENT LAMPIRAN =======================================================

        $application_letter = $request->file('application_letter')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
        $registration_certificate = $request->file('registration_certificate')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);  // required
        $account_statement = $request->file('account_statement')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);   // required

        $spending_statement = null;
        $support_letter = null;
        $committee_member = null;
        $certificate_or_letter_temple = null;
        $invitation_letter = null;

        if($request->category == "KUIL_H" || $request->category == "KUIL_G"){
            $spending_statement = $request->file('spending_statement')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
            $support_letter = $request->file('support_letter')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required

            if ($request->file('committee_member') != null) { //not required
                $committee_member = $request->file('committee_member')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }

            if ($request->file('certificate_or_letter_temple') != null) { //not required
                $certificate_or_letter_temple = $request->file('certificate_or_letter_temple')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }

            if ($request->file('invitation_letter') != null) { //not required
                $invitation_letter = $request->file('invitation_letter')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
            }
        }

        //======================================================= END OF UPLOAD DOCUMENT LAMPIRAN =======================================================


        //======================================================= CREATE PERMOHONAN =======================================================
        
        $permohonan = Permohonan::create([
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

            if($data == "AKTIVITI KEAGAMAAN"){  //-------------------- OPTION 1 --------------------

                $files_opt_1_photo = $request->file('opt_1_photo');
                foreach($files_opt_1_photo as $opt_1_photo){

                    $file_type = $opt_1_photo->extension();
                    $saved_photo_url = $opt_1_photo->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
                    $descripton = "opt_1_photo";

                    $lampiran = Lampiran::create([
                        'tujuan_id' => $tujuan->id,
                        'file_type' => $file_type,
                        'url' => $saved_photo_url,
                        'description' => $descripton,
                    ]);
                }

            } elseif($data == "PENDIDIKAN KEAGAMAAN"){ //-------------------- OPTION 2 --------------------

                $saved_photo_url = $request->file('opt_2_file_1')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                $saved_photo_url = $request->file('opt_3_file_1')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                    $saved_photo_url = $opt_3_photo->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
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
                $saved_photo_url = $request->file('opt_4_file_1')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                    $saved_photo_url = $opt_4_photo->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
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
                    $saved_photo_url = $opt_4_2_photo->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
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
                $saved_photo_url = $request->file('opt_5_file_1')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                    $saved_photo_url = $request->file('opt_5_file_2')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                $saved_photo_url = $request->file('opt_5_file_3')->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);
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
                        $saved_photo_url = $opt_5_photo->store('muat-naik/permohonan/' . $current_date . '/rumah_ibadat_' . $rumah_ibadat->id);    // required
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


        //======================================================= SUCCESSFULL AND REDIRECT =======================================================

        return redirect()->route('user.halaman-utama')->with('success', 'Permohonan anda berjaya dihantar.');

        //======================================================= END OF SUCCESSFULL AND REDIRECT =======================================================
    }

    public function permohonan_khas()
    {
        return view('users.permohonan.khas');
    }

    public function permohonan_proses()
    {
        return view('users.permohonan.proses');
    }

    public function permohonan_lulus()
    {
        return view('users.permohonan.lulus');
    }

    public function permohonan_gagal()
    {
        return view('users.permohonan.gagal');
    }
}
