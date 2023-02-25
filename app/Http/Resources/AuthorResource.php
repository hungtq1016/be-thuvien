<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image = $this->image && $this->image->status ? $this->image :null;

        return [
            'id' => $this->id,
            'image'  => $image,
            'name'  => $this->name,
            'gender'  => $this->gender,
            'yob' => $this->yob,
            'yod'  => $this->yod,
            'country'  => $this->country,
            'slug' => $this->slug,
            'status' => $this->status,
        ];
    }
}
