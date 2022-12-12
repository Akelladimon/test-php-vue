<?php

namespace App\Http\Controllers;

use App\Events\HistoryEvent;
use App\Http\Requests\GameRequest;
use App\Http\Resources\Game\GameCollectionResource;
use App\Models\AccessLink;
use App\Services\GameService;
use Illuminate\Support\Collection;

class GameController
{
    /**
     * @param GameRequest $request
     * @return GameCollectionResource
     */
    public function getGame(GameRequest $request): GameCollectionResource
    {
        $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();
        if (!$accessLink->is_active) {
            abort(404);
        }

        $gameService = app(GameService::class);
        $win = $gameService->generateAmount();
        HistoryEvent::dispatch($win, $accessLink->user_id);

        return new GameCollectionResource(new Collection(['data' => $win]));
    }
}
