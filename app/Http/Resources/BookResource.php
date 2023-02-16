<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title'=> $this->title,
            'slug'=> $this->slug,
            'specialization'=> $this->specialization,
            'publisher'=> $this->publisher,
            'image'=> $this->image,
            'language'=> $this->language,
            'desc'=> $this->desc,
            'year'=> $this->year,
            'bookself'=> $this->bookself,
            'series'=> $this->series,
            'country'=> $this->country,
            'status'=> $this->status,
            'tags'=> $this->tags->isEmpty() ? null : $this->tags->pluck('name')->unique()->all(),
            'categories'=>$this->categories->isEmpty() ? null : $this->categories->pluck('name')->all(),
        ];
    }
}
