<?php

namespace App\Listeners;

use App\Events\HistoryEvent;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordHistory
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
     * Handle the event.
     *
     * @param  \App\Events\HistoryEvent  $event
     * @return void
     */
    public function handle(HistoryEvent $event)
    {
        History::create([
                'user_id' => $event->userId,
                'amount_win' => $event->amountWin,
        ]);
    }
}
