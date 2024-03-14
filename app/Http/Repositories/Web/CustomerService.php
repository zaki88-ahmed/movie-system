<?php

namespace App\Http\Repositories\Web;

use App\Http\Repositories\BaseRepository;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiDesignTrait;
use App\Http\Traits\CreateMediaTrait;
use App\Http\Traits\DeleteMediaTrait;
use App\Mail\ContactResponseMail;
use App\Models\Admin;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Media;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\countOf;

class CustomerService implements CustomerInterface {

    use ApiDesignTrait, CreateMediaTrait, DeleteMediaTrait;

    private $userModel;
    private $customerModel;
    private $mediaModel;
    private $categoryModel;
    private $movieModel;
    public function __construct(User $user, Customer $customer, Movie $movie, Category $category, Media $media) {

        $this->userModel = $user;
        $this->customerModel = $customer;
        $this->mediaModel = $media;
        $this->categoryModel = $category;
        $this->movieModel = $movie;
    }


    /**
     * @OA\Post(
     *      path="/api/customer/updateProfile",
     *      operationId="update Customer Profile",
     *      tags={"Customers"},
     *      summary="Update Customer Profile",
     *      description="Edit Customer Profile",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *          @OA\JsonContent(
     *        required={"name", "email","password","age"},
     *        @OA\Property(property="name", type="string", example="User"),
     *        @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
     *        @OA\Property(property="password", type="string", format="password", example="123456"),
     *        @OA\Property(property="age", type="integer", format="integer", example="20"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Customer Profile updated successfully",
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

    public function updateProfile($request)
    {
        // TODO: Implement updateProfile() method.
        $user = auth('sanctum')->user();
//        $user = $this->userModel::find($request->user_id);
        $customer = $this->customerModel::where('user_id', $user->id)->first();
//        dd($customer);
//        $this->customerModel->update($request->all());
        if($customer){
            $user->update($request->all());
            $customer->update($request->all());
        }
        return $this->apiResponse(200,'Customer updated successfully', null, CustomerResource::make($customer));
    }


    /**
     * @OA\Post(
     *      path="/api/customer/updateProfilePhoto",
     *      operationId="update Customer Profile Photo",
     *      tags={"Customers"},
     *      summary="Update Customer Profile Photo",
     *      description="Edit Customer Profile Photo",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     * *          @OA\MediaType(
     * *              mediaType="multipart/form-data",
     * *             @OA\Schema(
     * *                 allOf={
     * *                     @OA\Schema(ref="#components/schemas/item"),
     * *                     @OA\Schema(
     * *                     required={"media"},
     * *                     @OA\Property(description="media",property="media",type="string", format="binary")
     * *                 )
     * *                }
     * *              )
     * *          )
     * *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Customer Profile Photo updated successfully",
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


    public function updateProfilePhoto($request)
    {
        // TODO: Implement updateProfilePhoto() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
//        dd($request->all());
//        dd($request->media->getClientOriginalExtension());
        if($request->media){
//            dd($request->media->getClientOriginalExtension());
            $this->DeleteMediaTrait($customer->id, $this->mediaModel);
            $this->CreateMediaTrait($request->media, $customer, '/customer_medias');
        }
        return $this->ApiResponse(200, 'Customer Profile Photo Was Updated Successfully');

    }

    /**
     * @OA\Post(
     *      path="/api/customer/checkHistory",
     *      operationId="Check Movies History",
     *      tags={"Customers"},
     *      summary="Check Movies History",
     *      description="Check Movies History",
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
     *          description="All Movies History",
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

    public function checkHistory($request)
    {
        // TODO: Implement checkHistory() method.
        $user = auth('sanctum')->user();
        $moviesHistory = $user->movies;
        return $this->apiResponse(200,'All User Movies', NULL, $moviesHistory);
    }
    /**
     * @OA\Post(
     *      path="/api/customer/clearHistory",
     *      operationId="Clear Movies History",
     *      tags={"Customers"},
     *      summary="Clear Movies History",
     *      description="Clear Movies History",
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
     *          description="All Movies History Cleared Successfully",
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

    public function clearHistory($request)
    {
        // TODO: Implement clearHistory() method.
        $user = auth('sanctum')->user();
        $user->movies()->detach();
        return $this->ApiResponse(200, 'All History Cleared');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/clearSingleHistory",
     *      operationId="Clear Single Movies History",
     *      tags={"Customers"},
     *      summary="Clear Single Movies History",
     *      description="Clear Single Movies History",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *         required={"movie_id"},
     *         @OA\Property(property="movie_id", type="integer", format="integer", example="20"),
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Clear Single Movies History Successfully",
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

    public function clearSingleHistory($request)
    {
        // TODO: Implement clearSingleHistory() method.
        $user = auth('sanctum')->user();
        $movieId = $request->movie_id;
        $movie = $this->movieModel::find($movieId);
        if($movieId){
            $pivot = $user->movies()->where('movie_id', $movieId)->first();
//            dd($pivot);
            $pivot->delete();
            return $this->ApiResponse(200, 'Movie Cleared');
        }
    }

    /**
    /**
     * @OA\Get(
     *      path="/api/customer/showAllCategories",
     *      operationId="Show All Categories",
     *      tags={"Customers"},
     *      summary="Get All Categories ",
     *      description="Get All Categories",
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
     *          description="Get All Categories",
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

    public function showAllCategories()
    {
        // TODO: Implement showAllCategories() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $categories = $this->categoryModel::get();
//            return $this->ApiResponse(200, 'All Categories', null,  $categories);
            return $this->ApiResponse(200, 'All Categories', null,  CategoryResource::collection($categories));
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/categoryMovies",
     *      operationId="Get All Category Movies",
     *      tags={"Customers"},
     *      summary="Get All Category Movies",
     *      description="Get All Category Movies",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *         required={"category_id"},
     *         @OA\Property(property="category_id", type="integer", format="integer", example="20"),
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Get Category Movies Successfully",
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

    public function categoryMovies($request)
    {
        // TODO: Implement categoryMovies() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $category = $this->categoryModel->find($request->category_id);
//            dd($category);
//            return $this->ApiResponse(200, 'Category Movies', null,  $category->movies);
            return $this->ApiResponse(200, 'Category Movies', null,  CategoryResource::make($category));
        }
        return $this->ApiResponse(200, 'Not Authorized');

    }

    /**
     * @OA\Post(
     *      path="/api/customer/movieFreeOrPaid",
     *      operationId="Get All Free Or Paid Movies",
     *      tags={"Customers"},
     *      summary="Get All Free Or Paid Movies",
     *      description="Get All Free Or Paid Movies",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Get Category Movies Successfully",
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

    public function movieFreeOrPaid($request)
    {
        // TODO: Implement movieFreeOrPaid() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $movies = $this->movieModel::where('isFree', $request->isFree)->get();
            return $this->ApiResponse(200, 'All Movies', null, MovieResource::collection($movies));
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/movieDetails",
     *      operationId="Get All Movie Details",
     *      tags={"Customers"},
     *      summary="Get All Movie Details",
     *      description="Get All Movie Details",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *         required={"movie_id"},
     *         @OA\Property(property="movie_id", type="integer", format="integer", example="2"),
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Get All Movie Detaila",
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


    public function movieDetails($request)
    {
        // TODO: Implement movieDetails() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $movie = $this->movieModel::find($request->movie_id);
            $movieCategory = DB::table('category_movie')->where('movie_id', $request->movie_id)->first();
            $recommendedMoviesPivot = DB::table('category_movie')->where('category_id', $movieCategory->category_id)->get();

            $recommendedMovies = [];
            foreach ($recommendedMoviesPivot as $value){
                $movieArr = $this->movieModel::find($value->movie_id);
                $recommendedMovies[] = $movieArr;
            }
            $data = [
              'movie' =>   MovieResource::make($movie),
              'recommendedMovies' =>   $recommendedMovies,
            ];
            return $this->ApiResponse(200, 'Movie Details', null, $data);
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/watchFreeMovie",
     *      operationId="Watch Free Movies",
     *      tags={"Customers"},
     *      summary="Watch Free Movies",
     *      description="Watch Free Movies",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *         required={"movie_id"},
     *         @OA\Property(property="movie_id", type="integer", format="integer", example="2"),
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Get All Free Movies",
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


    public function watchFreeMovie($request)
    {
        // TODO: Implement watchFreeMovie() method.
        $user = auth('sanctum')->user();
        $customer = $this->customerModel::where('user_id', $user->id)->first();
        if($customer){
            $movie = $this->movieModel::find($request->movie_id);
            if($movie->isFree){
                return $this->ApiResponse(200, 'You can watch Movie');
            }
            return $this->ApiResponse(200, 'You cannot watch movie');
        }
        return $this->ApiResponse(200, 'Not Authorized');
    }

    /**
     * @OA\Post(
     *      path="/api/customer/createUserMovie",
     *      operationId="Create User Movie",
     *      tags={"Customers"},
     *      summary="Create User Movie",
     *      description="Create User Movie",
     *     security={ {"sanctum": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Pass user credentials",
     *         @OA\JsonContent(
     *         required={"movie_id"},
     *         @OA\Property(property="movie_id", type="integer", format="integer", example="2"),
     *           ),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="User Movie is created",
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


    public function createUserMovie($request)
    {
        // TODO: Implement createUserMovie() method.
        $user = auth('sanctum')->user();
        $userId = $user->id;
        $movieId = $request->movie_id;
        $pivotRow = $user->movies()->where([['user_id', $userId], ['movie_id', $movieId]])->first();

        if(!$pivotRow){
            $user->movies()->attach($request->movie_id);
            return $this->ApiResponse(200, 'Movie Added To User');
        }
        DB::table('movie_user')->where([['user_id', $userId], ['movie_id', $movieId]])
            ->update([
                'updated_at' => Carbon::now(),
            ]);

        return $this->ApiResponse(200, 'Movie Already Exist');
    }

//    public function recommendedMovie($request)
//    {
//        // TODO: Implement recommendedMovie() method.
//    }
}
