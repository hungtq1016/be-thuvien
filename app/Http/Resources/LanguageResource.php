<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
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
            'id' => $this->when($request->user()->greaterThan(3), 'id'),
            'name' => $this->name,
            'slug' => $this->when($request->user()->greaterThan(3), 'slug'),
            'status' => $this->when($request->user()->greaterThan(3), 'status'),
        ];
    }
}
