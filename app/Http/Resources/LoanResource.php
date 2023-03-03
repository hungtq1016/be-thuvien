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
        $book = $this->book()->select('books.name','books.id')->first();
        $detail = $this->detail()->select('loans.name','loans.money'    )->first();
        return [
            'id' => $this->id,
            'book' => $book,
            'detail' => $detail,
            'expired_time'=>$this->expired_time,
            'start_time'=>$this->start_time
        ];
    }
}
