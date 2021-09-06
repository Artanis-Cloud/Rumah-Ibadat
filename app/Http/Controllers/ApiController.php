<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $url = 'https://mysmsdvsb.azurewebsites.net/api/messages/';

    public function index()
    {
        $api_key = config('app.MYSMS_KEY');
        $id = '1'; // assign sms id | leave blank to get all messages

        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => $api_key
        // ])->get($this->url . $id); //get specific message
        // dd($api_key);

        $response = Http::withToken($api_key)->get($this->url . $id);

        dd($response->json());

        if (isset($response->json()['error'])) { //return error page on error true
            abort(403, 'Error Response');
        } elseif ($response->successful()) {
            return $response->json()[0];
        } else {
            abort(403, 'No Response');
        }
    }

    public function sendMessage(Request $request)
    {
        $api_key = config('app.MYSMS_KEY');
        // $api_key = 'FOLV76N0t0lfIUGQoXiljyjXid/CGAmxn2fSmfHEgsY=';
        // dd($api_key);
        // $response = Http::withToken($api_key)->post($this->url, [
        //     'keyword' => 'UPEN',
        //     "message" => $request->message ?? 'Test',
        //     "msisdn" => $request->no_tel ?? '01110613736'
        // ]);
        $response = Http::withHeaders([
            'authorization' => $api_key,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'keyword' => 'UPEN',
            "message" => $request->message ?? 'Test',
            "msisdn" => $request->no_tel ?? '01110613736'
        ]);
        // dd($api_key);
        // dd($response->json());
        if($response->failed()){
            abort(403, 'Failed response ');
        }else{
            dd($response->json());
        }
    }
}
