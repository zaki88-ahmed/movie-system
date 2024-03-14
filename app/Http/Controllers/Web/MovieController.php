<?php

namespace App\Http\Controllers\Web;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Repositories\Web\MovieInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Models\Admin;
use App\Models\Movie;
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



class MovieController extends Controller
{


    private $movieInterface;

    public function __construct(MovieInterface $movieInterface)
    {
        $this->movieInterface = $movieInterface;
    }
    public function allMovies()
    {
        return $this->movieInterface->allMovies();
    }


    public function showMovie(Movie $movie)
    {
//        dd($project);
        return $this->movieInterface->showMovie($movie);
    }



    public function createMovie(Request $request)
    {
        return $this->movieInterface->createMovie($request);
    }


    public function storeMovie(Request $request)
    {
        return $this->movieInterface->storeMovie($request);
    }


    public function editMovie(Movie $movie)
    {
//        dd($project);
        return $this->movieInterface->editMovie($movie);
    }


    public function updateMovie(Movie $movie, Request $request)
    {
        return $this->movieInterface->updateMovie($movie, $request);
    }


    public function deleteMovie(Movie $movie, Request $request)
    {
        return $this->movieInterface->deleteMovie($movie, $request);
    }

    public function restoreMovie(Movie $movie, Request $request)
    {
        return $this->movieInterface->restoreMovie($movie, $request);
    }



}
