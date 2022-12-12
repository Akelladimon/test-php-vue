<?php

namespace App\Http\Resources\AccessLink;

use Illuminate\Http\Resources\Json\JsonResource;

class AccessLinkResource extends JsonResource
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
            'url' => $this->url,
            'isActive' => $this->is_active,
            'uuid' => $this->uuid,
            'userId' => $this->user_id,
        ];
    }
}
