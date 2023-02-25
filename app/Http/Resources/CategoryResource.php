<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image =  $this->image;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $image,
            'desc' => $this->desc,
            'slug' => $this->slug,
            'status' => $this->status,
            'books_count' => $this->whenCounted('books'),
            'books' => $this->books->isEmpty() ? null : BookResource::collection($this->books),
        ];
    }
}
