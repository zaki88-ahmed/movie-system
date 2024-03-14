<?php

namespace App\Http\Repositories\Api;

use App\Http\Repositories\BaseRepository;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiDesignTrait;
use App\Mail\ContactResponseMail;
use App\Models\Admin;

use App\Models\Customer;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\countOf;

class
ReviewService implements ReviewInterface {
    use ApiDesignTrait;

    private $userModel;
    private $customerModel;
    private $reviewModel;
    private $movieModel;

    public function __construct(User $user, Customer $customer, Review $review, Movie $movie) {

        $this->userModel = $user;
        $this->customerModel = $customer;
        $this->reviewModel = $review;
        $this->movieModel = $movie;
    }


    /**
    /**
     * @OA\Post(
     *      path="/api/customer/createReview",
     *      operationId="Create Review",
     *      tags={"Reviews"},
     *      summary="Create Review",
     *      description="Create Review",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass review credentials",
     *          @OA\JsonContent(
     *              required={"stars", "is_hidden", "movie_id"},
     *              @OA\Property(property="stars", type="integer", format="integer", example="3"),
     *              @OA\Property(property="comment", type="string", format="string", example="abc"),
     *              @OA\Property(property="is_hidden", type="boolean", format="boolean", example="0"),
     *              @OA\Property(property="movie_id", type="integer", format="integer", example="1")
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Review Created successfully",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *        @OA\Response(
     *          response=400,
     *          description="Validation Error"
     *      )
     *     )
     */

    public function createReview($request)
    {
        // TODO: Implement createReview() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $data['user_id'] = $user->id;
            $data += $request->all();
            $review = $this->reviewModel::create($data);
            return $this->ApiResponse(200, 'Movie Review', null, $review);
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/editReview",
     *      operationId="update Review",
     *      tags={"Reviews"},
     *      summary="Update Review",
     *      description="Edit Review",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *          @OA\JsonContent(
     *              required={"stars", "is_hidden", "movie_id", "review_id"},
     *               @OA\Property(property="stars", type="integer", format="integer", example="3"),
     *               @OA\Property(property="comment", type="string", format="string", example="abc"),
     *               @OA\Property(property="is_hidden", type="boolean", format="boolean", example="0"),
     *               @OA\Property(property="movie_id", type="integer", format="integer", example="1"),
     *               @OA\Property(property="review_id", type="integer", format="integer", example="1")
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Review updated successfully",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *        @OA\Response(
     *          response=400,
     *          description="Validation Error"
     *      )
     *     )
     */
    public function editReview($request)
    {
        // TODO: Implement editReview() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $data['user_id'] = $user->id;
            $data += $request->all();
            $review = $this->reviewModel::find($request->review_id);
            $review->update($data);
            return $this->ApiResponse(200, 'Review Updated Successfully', null, $review);
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/deleteReview",
     *      operationId="Delete Review",
     *      tags={"Reviews"},
     *      summary="Update Review",
     *      description="Edit Review",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass Review credentials",
     *          @OA\JsonContent(
     *              required={"review_id"},
     *              @OA\Property(property="review_id", type="integer", format="review_id", example="1"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Review Deleted successfully",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *        @OA\Response(
     *          response=400,
     *          description="Validation Error"
     *      )
     *     )
     */

    public function deleteReview($request)
    {
        // TODO: Implement deleteReview() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $review = $this->reviewModel::find($request->review_id);
            if($review){
//                dd($review);
                $review->delete();
                return $this->ApiResponse(200, 'Review Deleted', null, $review);
            }
            return $this->ApiResponse(200, 'Review Not Found');
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
    /**
     * @OA\Get(
     *      path="/api/customer/allReviews",
     *      operationId="Create user",
     *      tags={"Reviews"},
     *      summary="Get All Reviews",
     *      description="Get All Reviews",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *          @OA\JsonContent(
     *
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Get All Reviews",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *        @OA\Response(
     *          response=400,
     *          description="Validation Error"
     *      )
     *     )
     */

    public function allReviews($request)
    {
        // TODO: Implement allReviews() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $movie = $this->movieModel::find($request->movie_id);
//            return ($movie->reviews);
            return $this->ApiResponse(200, 'Movie Reviews', null, $movie->reviews);
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }
}
