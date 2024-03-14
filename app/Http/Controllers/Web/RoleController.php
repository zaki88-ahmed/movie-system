<?php

namespace App\Http\Controllers\Web;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Repositories\Web\CategoryInterface;
use App\Http\Repositories\Web\MovieInterface;
use App\Http\Repositories\Web\RoleInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Role;
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



class RoleController extends Controller
{


    private $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }
    public function allRoles()
    {
        return $this->roleInterface->allRoles();
    }


    public function showRole(Role $role)
    {
        return $this->roleInterface->showRole($role);
    }



    public function createRole(Request $request)
    {
        return $this->roleInterface->createRole($request);
    }


    public function storeRole(Request $request)
    {
        return $this->roleInterface->storeRole($request);
    }


    public function editRole(Role $role)
    {
//        dd($project);
        return $this->roleInterface->editRole($role);
    }


    public function updateRole(Role $role, Request $request)
    {
        return $this->roleInterface->updateRole($role, $request);
    }


    public function deleteRole(Role $role, Request $request)
    {
        return $this->roleInterface->deleteRole($role, $request);
    }


    public function assignPermission(Permission $permission)
    {
        return $this->roleInterface->assignPermission($permission);
    }

    public function revokePermission(Permission $permission)
    {
        return $this->roleInterface->revokePermission($permission);
    }

    public function assignRole(Role $role)
    {
        return $this->roleInterface->assignRole($role);
    }

    public function revokeRole(Role $role)
    {
        return $this->roleInterface->revokeRole($role);
    }


}
