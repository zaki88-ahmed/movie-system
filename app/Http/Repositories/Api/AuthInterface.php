<?php
namespace App\Http\Repositories\Api;


interface AuthInterface {

    public function register($request);
    public function login($request);
    public function logout();

}
