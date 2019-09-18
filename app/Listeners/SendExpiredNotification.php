<?php

namespace App\Listeners;

use App\Notification;
use App\Site;
use App\Events\NotificationExpired;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendExpiredNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *. Handle the event.
     *
     * @param  NotificationExpired  $event
     * @return void
     */
    public function handle(NotificationExpired $event)
    {
        Notification::sendUserNotifications();
    }
}
