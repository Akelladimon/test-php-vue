<?php

namespace App\Services;

use App\Http\Controllers\AccessLinkController;
use App\Models\AccessLink;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AccessLinkService
{
    public function createInteractionLink(int $user_id): void
    {
        $uuid = Str::uuid();

        AccessLink::create([
            'user_id' => $user_id,
            'uuid' => $uuid,
            'end_time' => Carbon::now()->addDays(7),
            'url' => action([AccessLinkController::class, 'getAccess'], ['uuid' => $uuid]),
        ]);
    }
}
