<?php

namespace App\Http\Controllers;

use App\Http\Resources\History\HistoryCollectionResource;
use App\Models\AccessLink;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController
{
    /**
     * @param Request $request
     *
     * @return HistoryCollectionResource
     */
    public function index(Request $request): HistoryCollectionResource
    {
        if (!$request->uuid) {
            abort(404);
        }

        $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();
        $showElements = $request->elements ?? History::SHOW_ELAMENTS;
        $histories = History::where('user_id', '=', $accessLink->user_id)->take($showElements)->get();

        return new HistoryCollectionResource($histories);
    }
}
