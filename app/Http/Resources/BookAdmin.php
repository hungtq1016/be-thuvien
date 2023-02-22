<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookAdmin extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $major = $this->major == null ? null: $this->major->id;
        $publisher = $this->publisher == null ? null: $this->publisher->id;
        $language = $this->language == null ? null: $this->language->id;
        $bookshelf = $this->bookshelf == null ? null: $this->bookshelf->id;
        $series = $this->parent == null ? null: $this->parent->id;
        $tags = $this->tags()->select('tags.id')->get()->unique();
        $categories = $this->categories()->select('categories.id')->get()->unique();
        $authors = $this->authors()->select('authors.id')->get()->unique();

        return [
            'id' => $this->id,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'image'=> $this->image,
            'country'=> $this->country,
            'desc'=> $this->desc,
            'release'=> $this->release,
            'major_id'=>$major,
            'publisher_id'=>$publisher,
            'language_id'=>$language,
            'bookshelf_id'=>$bookshelf,
            'series_id'=>$series,
            'tags'=> $this->tags->isEmpty() ? null : $tags,
            'categories'=>$this->categories->isEmpty() ? null : $categories,
            'authors'=>$this->authors->isEmpty() ? null : $tags,
            'status'=> $this->status,
        ];
    }
}
