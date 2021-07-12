<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\Request;

use Auth;
use App\Models\Audit;

class LogSuccessfullLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $current_date = date('Y-m-d H:i:s'); //get current date
        if(Auth::user())
        {
          $data = [
             'auditable_id' =>  Auth::user()->id,
             'auditable_type' => get_class($event->user),
             'event'      => "Log Keluar",
             'url'        => $this->request->fullUrl(),
             'ip_address' => $this->request->getClientIp(),
             'user_agent' => $this->request->userAgent(),
             'created_at' => $current_date,
             'updated_at' => $current_date,
             'user_id'    => Auth::user()->id,
         ];
         $details = Audit::create($data);
        }
      
    }
}
