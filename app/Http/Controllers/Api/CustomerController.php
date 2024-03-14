<?php

namespace App\Http\Controllers\Api;

use App\Http\Repositories\Users\AuthInterface;
use App\Http\Repositories\Users\CustomerInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\CustomerRequest\ClearSingleHistoryRequest;
use App\Http\Requests\CustomerRequest\CreateUserMovieRequest;
use App\Http\Requests\CustomerRequest\CustomerUpdatePhotoRequest;
use App\Http\Requests\CustomerRequest\CustomerUpdateProfileRequest;
use App\Http\Requests\CustomerRequest\MovieDetailsRequest;
use App\Http\Requests\CustomerRequest\WatchFreeMovieRequest;
use App\Http\Requests\RegisterRequest;
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



class CustomerController extends Controller
{


    private $customerInterface;

    public function __construct(CustomerInterface $customerInterface)
    {
        $this->customerInterface = $customerInterface;
    }

    public function updateProfile(CustomerUpdateProfileRequest $request){
        return $this->customerInterface->updateProfile($request);
    }

    public function updateProfilePhoto(CustomerUpdatePhotoRequest $request){
//        dd($request->all());
//        dd($request->media[0]->getClientOriginalExtension());
        return $this->customerInterface->updateProfilePhoto($request);
    }

    public function checkHistory(Request $request){
        return $this->customerInterface->checkHistory($request);
    }

    public function clearHistory(Request $request){
        return $this->customerInterface->clearHistory($request);
    }

    public function clearSingleHistory(ClearSingleHistoryRequest $request){
        return $this->customerInterface->clearSingleHistory($request);
    }

    public function showAllCategories(){
        return $this->customerInterface->showAllCategories();
    }


    public function categoryMovies(Request $request){
        return $this->customerInterface->categoryMovies($request);
    }

    public function movieFreeOrPaid(Request $request){
        return $this->customerInterface->movieFreeOrPaid($request);
    }

    public function movieDetails(MovieDetailsRequest $request){
        return $this->customerInterface->movieDetails($request);
    }

    public function watchFreeMovie(WatchFreeMovieRequest $request){
        return $this->customerInterface->watchFreeMovie($request);
    }

//    public function recommendedMovie(Request $request){
//        return $this->customerInterface->recommendedMovie($request);
//    }

    public function createUserMovie(CreateUserMovieRequest $request){
        return $this->customerInterface->createUserMovie($request);
    }



}
