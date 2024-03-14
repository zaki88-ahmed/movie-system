<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $url = [];
        foreach ($this->medias as $media){
            $url[] = new MediaResource($media);
        }
        return [
            'joined_date' => $this->joined_date,
            'user_id' => $this->when($this->user()->exists(), $this->user),
            'profile_photo' => $url,
        ];
    }
}
