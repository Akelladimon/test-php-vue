<?php

namespace App\Http\Resources\History;

use App\Http\Resources\BaseJsonCollectionResource;

class HistoryCollectionResource extends BaseJsonCollectionResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = HistoryResource::class;
}
