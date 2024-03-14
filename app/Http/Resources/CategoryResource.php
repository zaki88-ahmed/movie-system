<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class CategoryResource extends JsonResource
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
        $movieArr = [];
        foreach ($this->movies as $movie){
            $movieArr[] = new MovieResource($movie);
        }
        return [
            'name' => $this->getTranslations('name')[App::currentLocale()],
//            'name_en' => $this->name->en,
//             'name_ar' => $this->name->ar,
//            'name_en' => json_decode($this->name)->en,
//            'name_ar' => json_decode($this->name)->ar,

            'parent_id' => $this->parent_id,
            'media' => $url,
//            'movies' => $this->when($this->movies()->exists(), $this->movies->title),
            'movies' => $movieArr,

        ];
    }
}
