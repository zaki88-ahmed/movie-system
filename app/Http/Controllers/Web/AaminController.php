<?php

namespace App\Http\Controllers\Web;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Models\Admin;
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



class AaminController extends Controller
{


    private $adminInterface;

    public function __construct(AdminInterface $adminInterface)
    {
        $this->adminInterface = $adminInterface;
    }

    public function allAdmins()
    {
        return $this->adminInterface->allAdmins();
    }


    public function showAdmin(Admin $admin)
    {
//        dd($project);
        return $this->adminInterface->showAdmin($admin);
    }


    public function createAdmin(Request $request)
    {
        return $this->adminInterface->createAdmin($request);
    }


    public function storeAdmin(Request $request)
    {
        return $this->adminInterface->storeAdmin($request);
    }


    public function editAdmin(Admin $admin)
    {
//        dd($project);
        return $this->adminInterface->editAdmin($admin);
    }


    public function updateAdmin(Admin $admin, Request $request)
    {
        return $this->adminInterface->updateAdmin($admin, $request);
    }


    public function deleteAdmin(Admin $admin, Request $request)
    {
//        dd('qq');
        return $this->adminInterface->deleteAdmin($admin, $request);
    }

    public function restoreAdmin(Admin $admin, Request $request)
    {
//        dd('cc');
        return $this->adminInterface->restoreAdmin($admin, $request);
    }

    public function callBack(Admin $admin)
    {
//        dd('cc');
        dd('vv');
    }





}
