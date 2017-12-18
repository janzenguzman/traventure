<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class UpdateLastSignedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->last_signed_in = Carbon::now();
        $event->user->save();
    }
}
