<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user()->select('users.name','users.email')->get();
        $book = $this->book()->select('books.name','books.id')->get();
        $detail = $this->detail()->select('loans.name','loans.money')->get();
        return [
            'id' => $this->id,
            'user' => $user[0],
            'book' => $book[0],
            'detail' => $detail[0],
            'expired_time'=>$this->expired_time,
            'start_time'=>$this->start_time
        ];
    }
}
