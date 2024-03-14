<?php

namespace App\Http\Controllers\Web;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Repositories\Web\MovieInterface;
use App\Http\Repositories\Web\ReviewInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Models\Admin;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Traits\ApiDesignTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

//use App\Http\Interfaces\PostInterface;
//use App\Http\Interfaces\PostInterface;



class ReviewController extends Controller
{


    private $reviewInterface;

    public function __construct(ReviewInterface $reviewInterface)
    {
        $this->reviewInterface = $reviewInterface;
    }
    public function allReviews()
    {
        return $this->reviewInterface->allReviews();
    }


    public function showReview(Review $review)
    {
//        dd($project);
        return $this->reviewInterface->showReview($review);
    }



    public function createReview(Request $request)
    {
        return $this->reviewInterface->createReview($request);
    }


    public function storeReview(Request $request)
    {
        return $this->reviewInterface->storeReview($request);
    }


    public function editReview(Review $review)
    {
//        dd($project);
        return $this->reviewInterface->editReview($review);
    }


    public function updateReview(Review $review, Request $request)
    {
        return $this->reviewInterface->updateReview($review, $request);
    }


    public function deleteReview(Review $review, Request $request)
    {
        return $this->reviewInterface->deleteReview($review, $request);
    }

//    public function restoreReview(Review $review, Request $request)
//    {
//        return $this->reviewInterface->restoreReview($review, $request);
//    }



}
