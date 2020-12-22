<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Posts extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //parent::toArray($request)
        return [
            'id' => $this->id,
            //$table->unsignedBigInteger('category_id');
            'user_id' => $this->user_id,
            'last_user_id' => $this->last_user_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
            'description_img' => $this->description_img,
            'description_txt' => $this->description_txt,
            'is_original' => $this->is_original,
            'is_draft' => $this->is_draft,
            'comment_count' => $this->comment_count,
            'view_count' => $this->view_count,
            'published_at' => $this->published_at,
        ];
    }
}
