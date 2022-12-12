<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $accessLink = $this->activeAccessLink();
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'id' => $this->id,
            'link' => $accessLink?->url,
            'uuid' => $accessLink?->uuid,
        ];
    }
}
