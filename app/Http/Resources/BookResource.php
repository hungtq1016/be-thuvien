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
            'image'=> $this->image,
            'country'=> $this->country,
            'desc'=> $this->desc,
            'year'=> $this->year,
            'major_id'=> $this->major_id,
            'publisher_id'=> $this->publisher_id,
            'language_id'=> $this->language_id,
            'bookself_id'=> $this->bookself_id,
            'series_id'=> $this->series_id,
            'status'=> $this->status,
            'tags'=> $this->tags->isEmpty() ? null : $this->tags()->select('tags.id','tags.name')->get()->unique(),
            'categories'=>$this->categories->isEmpty() ? null : $this->categories()->select('categories.id','categories.name')->get()->unique(),
            'authors'=>$this->authors->isEmpty() ? null : $this->authors()->select('authors.id','name')->get()->unique(),
        ];
    }
}
