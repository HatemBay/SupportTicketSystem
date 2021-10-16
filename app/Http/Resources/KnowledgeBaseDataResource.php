<?php

namespace App\Http\Resources;

use App\Models\SubCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class KnowledgeBaseDataResource extends JsonResource
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
            'sub_category_id' => $this->sub_category_id,
            'title' => $this->title,
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => optional($this->created_at)->format('Y-m-d H:i:s'),
            'sub_categories' => SubCategoryResource::collection(SubCategory::where('id', 'like', $this->sub_category_id)->get())
        ];
    }
}
