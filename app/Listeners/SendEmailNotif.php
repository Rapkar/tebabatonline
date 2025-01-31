<?php

namespace App\Listeners;

use App\Events\UserLogedin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

class SendEmailNotif
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    $ip=$_SERVER['REMOTE_ADDR'];  
    Log::info("user loged in :  ip . $ip");
    Log::error("user loged wrong in :  ip . $ip");
    Log::emergency("user loged hacked in :  ip . $ip");
    }

    /**
     * Handle the event.
     */
    public function handle(UserLogedin $event): void
    {
        //
    }
}
