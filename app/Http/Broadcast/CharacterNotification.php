<?php


namespace App\Http\Broadcast;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CharacterNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $characterId;
    public $icon;
    public $message;

    public function __construct($characterId, $icon, $message)
    {
        $this->message = $message;
        $this->characterId = $characterId;
        $this->icon = $icon;
    }

    public function broadcastOn()
    {
        return new Channel('Character.Notification.' . $this->characterId);
    }

    public function broadcastAs()
    {
        return 'characterNotification';
    }
}
