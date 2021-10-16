<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'created_at' => str_ireplace(
                [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'],
                ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
                $this->created_at->diffForHumans()
            ),
            'updated_at' => str_ireplace(
                [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'],
                ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
                $this->updated_at->diffForHumans()
            ),
        ];
    }
}
