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
        $books = $this->children()->select('books.id','books.name','books.slug')->get()->unique();
        $image = $this->image()->select('images.id','images.name','images.path')->get(1);
        $major = $this->major()->select('majors.id','majors.name')->get(1);
        $language = $this->language()->select('languages.id','languages.name')->get(1);
        $publisher = $this->publisher()->select('publishers.id','publishers.name')->get(1);
        $bookshelf = $this->bookshelf()->select('bookshelves.id','bookshelves.name')->get(1);
        // $comments = $this->comments()->select('comments.id','comments.comment')->get();
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'avgRating'=> $this->avgRating,
            'slug'=> $this->slug,
            'country'=> $this->country,
            'desc'=> $this->desc,
            'release'=> $this->release,
            'status'=> $this->status,
            'quantity'=>$this->quantity,
            'count'=>$this->count,
            'image'=> $this->image,
            'major'=>$major,
            'publisher'=> $publisher,
            'language'=>$language,
            'bookshelf'=> $bookshelf,

            'series'=> $books,

            'tags'=> $tags,
            'categories'=> $categories,
            'authors'=> $authors,
        ];
    }
}
