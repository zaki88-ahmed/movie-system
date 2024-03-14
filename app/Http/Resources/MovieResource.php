<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class MovieResource extends JsonResource
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

//        dd($this->getTranslations('title'));
        return [
//            'title' => $this->title,
//            'title' => $this->getTranslations('title'),
            'title' => $this->getTranslations('title')[App::currentLocale()],
//            'summary' => $this->getTranslations('summary'),
            'summary' => $this->getTranslations('summary')[App::currentLocale()],
            'duration' => $this->duration,
            'launched_year' => $this->launched_year,
            'isFree' => $this->isFree,
            'reviews' => $this->when($this->reviews()->exists(), $this->reviews) ? $this->reviews : null,
            'categories' => $this->when($this->categories()->exists(), $this->categories),
            'media' => $url,
        ];
    }
}
