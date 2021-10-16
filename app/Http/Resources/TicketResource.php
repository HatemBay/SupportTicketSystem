<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'user_id' => $this->user_id,
            'department_id' => $this->department_id,
            'priority_id' => $this->priority_id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'reply_status' => $this->reply_status,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => str_ireplace(
                [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'],
                ['s', 's', 'm', 'm', 'h', 'h', 'd', 'd', 'w', 'w'],
                $this->updated_at->diffForHumans()
            )
        ];
    }
}
