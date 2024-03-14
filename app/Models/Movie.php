<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['title', 'summary'];
    public $fillable = ['title', 'summary', 'duration', 'launched_year', 'isFree'];
    protected $hidden = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie', 'movie_id', 'category_id');
    }

//    public function categories()
//    {
//        return $this->hasMany(Category::class, 'category_id', 'id');
//    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'movie_user', 'movie_id', 'user_id')
            ->withTimestamps();
    }

    public function medias(){
        return $this->morphToMany(Media::class, 'mediable');
    }
}
