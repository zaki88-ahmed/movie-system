<?php
namespace App\Http\Repositories\Api;


interface ReviewInterface {

    public function allReviews($request);
    public function createReview($request);
    public function editReview($request);
    public function deleteReview($request);

}
