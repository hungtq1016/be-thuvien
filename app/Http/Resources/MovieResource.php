<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image'  => $this->image,
            'title'  => $this->title,
            'link'  => $this->link,
            'year' => $this->year,
            'time'  => $this->time,
            'country'  => $this->country,
            'slug' => $this->slug,
            'status' => $this->status,
            'tags'=>$this->tags
        ];
    }
}
