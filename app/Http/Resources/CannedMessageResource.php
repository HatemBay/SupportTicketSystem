<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CannedMessageResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'status' => $this->status,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
