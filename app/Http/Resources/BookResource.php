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
        $categories = $this->categories()->select('categories.id','categories.name')->get()->unique();
        $major = $this->major()->select('majors.id','name')->get();
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'image'=> $this->image,
            'country'=> $this->country,
            'desc'=> $this->desc,
            'release'=> $this->release,
            'major'=>$major,
            'publisher'=> new PublisherResource($this->publisher),
            'language'=>new LanguageResource($this->language),
            'bookshelf'=> new BookShelfResource($this->bookshelf),

            'series'=> $this->children()->get()->unique(),
            'status'=> $this->status,
            'tags'=> $this->tags->isEmpty() ? null : $this->tags()->select('tags.id','tags.name')->get()->unique(),
            'categories'=>$this->categories->isEmpty() ? null : $categories,
            'authors'=>$this->authors->isEmpty() ? null : $this->authors()->select('authors.id','name')->get()->unique(),
        ];
    }
}
