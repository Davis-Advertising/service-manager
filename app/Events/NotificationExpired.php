<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationExpired
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $site;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($site)
    {
        $this->site = $site;
    }

}
