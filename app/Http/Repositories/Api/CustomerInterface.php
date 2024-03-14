<?php
namespace App\Http\Repositories\Api;


interface CustomerInterface {

    public function updateProfile($request);
    public function updateProfilePhoto($request);
    public function checkHistory($request);
    public function clearHistory($request);
    public function clearSingleHistory($request);
    public function showAllCategories();
    public function categoryMovies($request);
    public function movieFreeOrPaid($request);
    public function movieDetails($request);
    public function watchFreeMovie($request);
    public function createUserMovie($request);
//    public function recommendedMovie($request);
}
