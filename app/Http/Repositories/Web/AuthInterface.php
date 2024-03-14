<?php
namespace App\Http\Repositories\Web;


interface AuthInterface {

    public function register($request);
    public function login($request);
    public function logout();

}
