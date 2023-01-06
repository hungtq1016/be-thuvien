<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DirectorResource extends JsonResource
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
