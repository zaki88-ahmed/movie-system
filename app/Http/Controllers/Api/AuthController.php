<?php

namespace App\Http\Controllers\Api;

use App\Http\Repositories\Users\AuthInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
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



class AuthController extends Controller
{


    private $authInterface;

    public function __construct(AuthInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function register(RegisterRequest $request){
        return $this->authInterface->register($request);
    }

    public function login(LoginRequest $request){
        return $this->authInterface->login($request);
    }

    public function logout(){
        return $this->authInterface->logout();
    }







}
