<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Csm;
use App\Models\RumahIbadat;
use App\Models\Peruntukan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class WelcomeController extends Controller
{
    // landing page
    public function welcome()
    {
        $csm = Csm::get()->first();

        $banner = Banner::where('status', '1')->get();

        $pengumuman = Announcement::where('status', '1')->where('pemohon', '1')->get();

        //+++++++++++++++++++++++ checking peruntukan +++++++++++++++++++++++
        $current_date = date('Y-m-d H:i:s'); //get current date
        $current_year = date('Y'); //get current date
        $current_year = 2021;
        $annual_report_counter = Peruntukan::whereYear('created_at', $current_year)->count();

        if($annual_report_counter == 0){
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
        //+++++++++++++++++++++++ checking peruntukan +++++++++++++++++++++++

        $annual_report = Peruntukan::whereYear('created_at', $current_year)->first();

        $yb_approved_fund_tokong =      DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'TOKONG'      AND p.yb_id IS NOT NULL"));

        $yb_approved_fund_kuil =        DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'KUIL'        AND p.yb_id IS NOT NULL"));

        $yb_approved_fund_gurdwara =    DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'GURDWARA'    AND p.yb_id IS NOT NULL"));

        $yb_approved_fund_gereja =      DB::select(DB::raw("SELECT SUM(p.total_fund) as peruntukan FROM permohonans p, rumah_ibadats r WHERE r.id = p.rumah_ibadat_id AND p.status = '1' AND r.category = 'GEREJA'      AND p.yb_id IS NOT NULL"));

        return view('welcome', compact('csm', 'banner', 'pengumuman', 'annual_report', 'yb_approved_fund_tokong', 'yb_approved_fund_kuil', 'yb_approved_fund_gurdwara', 'yb_approved_fund_gereja'));
    }
}
