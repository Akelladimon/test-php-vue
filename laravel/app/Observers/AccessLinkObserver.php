<?php

namespace App\Observers;

use App\Models\User;
use App\Models\AccessLink;
use App\Services\AccessLinkService;

class AccessLinkObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User $user
     * @return void
     */
    public function created(User $user): void
    {
        $accessLinkService = app(AccessLinkService::class);
        $accessLinkService->createInteractionLink($user->id);
    }
}
