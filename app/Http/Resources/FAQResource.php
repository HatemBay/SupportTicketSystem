<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQResource extends JsonResource
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
            'f_a_q_category_id' => $this->f_a_q_category_id,
            'question' => $this->question,
            'answer' => $this->answer,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
