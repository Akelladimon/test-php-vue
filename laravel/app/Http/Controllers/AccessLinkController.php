<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessLinkRequest;
use App\Http\Requests\CreateAccessLinkRequest;
use App\Http\Requests\IsAccessRequest;
use App\Http\Resources\AccessLink\AccessLinkResource;
use App\Http\Resources\AccessLink\IsAccessLinkResource;
use App\Models\AccessLink;
use App\Services\AccessLinkService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AccessLinkController extends Controller
{

    /**
     * @param AccessLinkRequest $request
     *
     * @return AccessLinkResource
     */
    public function update(AccessLinkRequest $request): AccessLinkResource
    {
        $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();
        $accessLink::update([
            'is_active' => $request->is_active]
        );

        return new AccessLinkResource($accessLink);
    }

    public function getAccess(Request $request)
    {
        if ($request->uuid) {
            $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();

            return new IsAccessLinkResource(
               $accessLink->is_active && $accessLink->end_time > Carbon::now());
        }

        return new IsAccessLinkResource(false);
    }

    public function create(CreateAccessLinkRequest $request): AccessLinkResource
    {
        if ($request->uuid) {
            $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();
            $accessLink->is_active = false;
            $accessLink->save();
        }

        $accessLinkService = app(AccessLinkService::class);
        $accessLinkService->createInteractionLink($request->id);
        $newAccessLink = AccessLink::where('user_id', '=', $request->id)->first();

        return new AccessLinkResource($newAccessLink);
    }
}
