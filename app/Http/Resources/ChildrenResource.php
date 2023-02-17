<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChildrenResource extends JsonResource
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
            'name'=> $this->name,
            'slug'=> $this->slug,
            'image'=> $this->image,
            'desc'=> $this->desc,
            'year'=> $this->year,
            'bookself'=> new BookShelfResource($this->bookself),
            'status'=> $this->status,
        ];
    }
}
