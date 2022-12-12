<?php

namespace App\Http\Resources\User;

use App\Http\Resources\BaseJsonCollectionResource;

class UserCollectionResource extends BaseJsonCollectionResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = UserResource::class;
}
