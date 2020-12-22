<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            //$table->unsignedBigInteger('parent_id')->default(0);
            'name' => $this->name,
            'path' => $this->path,
            'description_img' => $this->description_img,
            'description_txt' => $this->description_txt,
        ];
    }
}
