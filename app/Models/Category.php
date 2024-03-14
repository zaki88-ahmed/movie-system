<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['name'];

    protected $fillable = ['name', 'parent_id'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];


    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'category_movie', 'category_id', 'movie_id');
    }

//    public function movies()
//    {
//        return $this->hasMany(Movie::class, 'category_id', 'id');
//    }

    public function medias(){
        return $this->morphToMany(Media::class, 'mediable');
    }

    public function name($lang = null){

//        $lang = $lang ?? App::getLocale();
        return json_decode($this->name)->$lang;

    }
}
