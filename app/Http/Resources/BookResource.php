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
        $categories = $this->categories()->select('categories.id','categories.name','categories.slug')->get()->unique();
        $tags = $this->tags()->select('tags.id','tags.name','tags.slug')->get()->unique();
        $authors = $this->authors()->select('authors.id','authors.name','authors.slug')->get()->unique();

        $image = $this->image && $this->image->status ? $this->image :null;
        $publisher = $this->publisher && $this->publisher->status ? $this->publisher :null;
        $major = $this->major && $this->major->status ? $this->major :null;
        $language = $this->language && $this->language->status ? $this->language :null;
        $bookshelf = $this->bookshelf && $this->bookshelf->status ? $this->bookshelf :null;

        return [
            'id' => $this->id,
            'name'=> $this->name,
            'slug'=> $this->slug,
            'country'=> $this->country,
            'desc'=> $this->desc,
            'release'=> $this->release,
            'status'=> $this->status,
            'quantity'=>$this->quantity,
            'count'=>$this->count,
            'image'=> $image,
            'major'=>$major,
            'publisher'=> $publisher,
            'language'=>$language,
            'bookshelf'=> $bookshelf,

            'series'=> $this->parent,

            'tags'=> $tags,
            'categories'=> $categories,
            'authors'=> $authors,
        ];
    }
}
