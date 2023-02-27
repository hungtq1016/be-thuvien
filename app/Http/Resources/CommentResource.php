<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user()->select('users.id','users.name','users.email')->get();

        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'rate' => $this->rate,
            'user' => $this->user,
        ];
    }
}
