<?php

namespace App\Http\Repositories\Web;

use App\Http\Repositories\BaseRepository;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiDesignTrait;
use App\Mail\ContactResponseMail;
use App\Models\Admin;

use App\Models\Customer;
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

class AuthService extends BaseRepository implements AuthInterface {
    use ApiDesignTrait;

    private $userModel;
    private $customerModel;
    public function __construct(User $user, Customer $customer) {

        $this->userModel = $user;
        $this->customerModel = $customer;
    }



    /**
     * @OA\Post(
     * path="/api/customer/register",
     * summary="register",
     * description="register by name , email and password",
     * operationId="authRegister",
     * tags={"Authentication"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Fill your Data",
     *    @OA\JsonContent(
     *       required={"name", "email","password","age"},
     *       @OA\Property(property="name", type="string", example="User"),
     *       @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
     *       @OA\Property(property="age", type="integer", format="integer", example="20"),
     *    ),
     * ),
     * @OA\Response(
     *     response=200,
     *     description="Success",
     *  ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     *
     */


    public function register($request)
    {
        // TODO: Implement register() method.
        $user = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
        ]);

        $customer = $this->customerModel::create([
            'joined_date' => Carbon::now(),
            'user_id' => $user->id,
        ]);
//        dd($user->email);
//        $user->assignRole('admin');
        if($user){
            Mail::to($user->email)->send(new ContactResponseMail($user));
        }
//        return ['admin' => $admin, 'user' => $user];
        return $this->ApiResponse(200, 'You have registered successfully', null, CustomerResource::make($customer));
    }



    /**
     * @OA\Post(
     * path="/api/customer/login",
     * summary="Sign in",
     * description="Login by email and password",
     * operationId="authLogin",
     * tags={"Authentication"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="123456"),
     *       @OA\Property(property="persistent", type="boolean", example="true"),
     *    ),
     * ),
     * @OA\Response(
     *     response=200,
     *     description="Success",
     *  ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */

    public function login($request)
    {
        // TODO: Implement login() method.
        $data = ["email" => $request->email, "password" => $request->password];
        return $this->auth('user', $data);
    }


    /**
     * @OA\Post(
     * path="/api/customer/logout",
     * summary="Logout",
     * description="Logout by email, password",
     * operationId="authLogout",
     * tags={"Authentication"},
     * security={ {"sanctum": {} }},
     * @OA\Response(
     *     response=200,
     *     description="Success",
     *
     *  ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */


    public function logout()
    {
        // TODO: Implement logout() method.
        $user = auth('sanctum')->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return $this->ApiResponse(200, 'Logged out');
    }
}
