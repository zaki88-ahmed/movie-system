<?php

namespace App\Http\Controllers\Api;

use App\Http\Repositories\Users\AuthInterface;
use App\Http\Repositories\Users\ReviewInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ReviewRequest\CreateCategoryRequest;
use App\Http\Requests\ReviewRequest\DeleteCategoryRequest;
use App\Http\Requests\ReviewRequest\EditCategoryRequest;
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

    public function allReviews(Request $request){
        return $this->reviewInterface->allReviews($request);
    }
    public function createReview(CreateCategoryRequest $request){
        return $this->reviewInterface->createReview($request);
    }

    public function editReview(EditCategoryRequest $request){
        return $this->reviewInterface->editReview($request);
    }

    public function deleteReview(DeleteCategoryRequest $request){
        return $this->reviewInterface->deleteReview($request);
    }

}
