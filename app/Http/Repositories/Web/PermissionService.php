<?php

namespace App\Http\Repositories\Web;

use App\Http\Repositories\BaseRepository;

use App\Http\Traits\ApiDesignTrait;
use App\Http\Traits\CreateMediaTrait;
use App\Http\Traits\DeleteMediaTrait;
use App\Models\Admin;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Media;
use App\Models\Movie;
use App\Models\Permission;
use App\Models\Role;
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

class PermissionService implements PermissionInterface {
    use ApiDesignTrait, CreateMediaTrait, DeleteMediaTrait;

    private $userModel;
    private $customerModel;
    private $adminModel;
    private $roleModel;
    private $permissionModel;
    public function __construct(User $user, Customer $customer, Admin $admin, Role $role, Permission $permission) {

        $this->userModel = $user;
        $this->customerModel = $customer;
        $this->adminModel = $admin;
        $this->roleModel = $role;

        $this->permissionModel = $permission;
    }


    public function allPermissions()
    {
        // TODO: Implement allPermissions() method.
        // $permissions = $this->permissionModel::with(['roles'])->orderBy('id', 'ASC')->get();
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->paginate(10);
        $data['permissions'] = $permissions;
        return view("admin.permissions.index")->with($data);
    }

    public function showPermission($permission)
    {
        // TODO: Implement showPermission() method.
        // $permissions = $this->permissionModel::with(['roles'])->orderBy('id', 'ASC')->get();
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->paginate(10);
        $data['permissions'] = $permissions;
        $data['permission'] = $permission;
        return view("admin.permissions.show")->with($data);
    }
}
