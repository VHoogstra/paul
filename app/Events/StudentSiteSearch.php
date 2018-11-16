<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use App\Student;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StudentSiteSearch
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $searchedString;
    /**
     * Create a new event instance.
     * @param String $student
     * @return void
     */
    public function __construct(String $searchedString)
    {
        $this->searchedString = $searchedString;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
