<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Admin;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Traits\ApiDesignTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Repositories\Web\MovieInterface;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Repositories\Web\CategoryInterface;
use App\Http\Repositories\Web\PermissionInterface;
use App\Http\Requests\AuthRequest\RegisterRequest;

//use App\Http\Interfaces\PostInterface;
//use App\Http\Interfaces\PostInterface;



class PermissionController extends Controller
{


    private $permissionInterface;

    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }
    public function allPermissions()
    {
        return $this->permissionInterface->allPermissions();
    }


    public function showPermission(Permission $permission)
    {
//        dd($project);
        return $this->permissionInterface->showPermission($permission);
    }

}
