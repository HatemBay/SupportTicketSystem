<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriorityResource extends JsonResource
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
            'bg_color' => $this->bg_color,
            'text_color' => $this->text_color,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => str_ireplace(
                [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'],
                ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
                $this->updated_at->diffForHumans()
            )
        ];
    }
}
