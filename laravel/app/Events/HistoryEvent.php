<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HistoryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Amount win number.
     *
     * @var int $amountWin
     */
    public int $amountWin;

    /**
     * User Id.
     *
     * @var int $userId
     */
    public int $userId;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $amountWin, int $userId)
    {
        $this->amountWin = $amountWin;
        $this->userId = $userId;
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
