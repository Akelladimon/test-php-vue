<?php

namespace App\Http\Resources\AccessLink;

use Illuminate\Http\Resources\Json\JsonResource;

class IsAccessLinkResource extends JsonResource
{

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'isActive' => $this->resource,
        ];
    }
}
