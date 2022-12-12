<?php

namespace App\Http\Resources\Game;

use App\Http\Resources\BaseJsonCollectionResource;

class GameCollectionResource extends BaseJsonCollectionResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = GameResource::class;
}
