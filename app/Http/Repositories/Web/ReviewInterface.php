<?php
namespace App\Http\Repositories\Web;


interface ReviewInterface {

    public function allReviews();

    public function showReview($review);

    public function createReview($request);

    public function storeReview($request);

    public function editReview($review);

    public function updateReview($review, $request);

    public function deleteReview($review, $request);
//    public function restoreReview($review, $request);

}
