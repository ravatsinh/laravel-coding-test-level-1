<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'startAt'=>$this->startAt,
            'endAt'=>$this->endAt,
            'createdAt'=>$this->createdAt,
            'updatedAt'=>$this->updatedAt
        ];
    }
}
