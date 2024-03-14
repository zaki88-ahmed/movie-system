<?php

namespace App\Http\Repositories\Web;

use App\Models\Role;

use App\Models\User;
use App\Models\Admin;
use App\Models\Media;
use App\Models\Movie;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ApiDesignTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Http\Traits\CreateMediaTrait;
use App\Http\Traits\DeleteMediaTrait;
use function PHPUnit\Framework\countOf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\BaseRepository;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class RoleService implements RoleInterface {
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


    public function allRoles()
    {
        // TODO: Implement allRoles() method.
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        return view("admin.roles.index")->with($data);
    }

    public function showRole($role)
    {
        // TODO: Implement showRole() method.
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $permissions = $role->permssions;
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        $data['role'] = $role;
        return view("admin.roles.show")->with($data);
    }

    public function createRole($request)
    {
        // TODO: Implement createRole() method.
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        return view("admin.roles.create")->with($data);
    }

    public function storeRole($request)
    {
        // $data['role'] = $request->role;
        // $role = $request->role;
        // foreach ($role->permissions as $permission){
        //     dd($request->rolePermission[$permission->id]);
        // }
        // dd($request->permission[]);
        // $permission = implode(',', Input::get('permission'));
        // $permission = implode(',', Input::get('permission', []));
        // dd('cc');
        $role = $this->roleModel::create([
            'name' => $request->name,
            'guard_name' => config('auth.defaults.guard'),
        ]);
        $permission= $request->input('rolePermission');
        foreach($permission as $key=>$val){
            DB::table('role_has_permissions')->insert([
                'role_id' =>$role->id,
                'permission_id' => $key,
            ]);
        }
        // $permission = implode(',', $request->permission);

        // DB::table($table_name)->insert($data);
        // TODO: Implement storeRole() method.
//        $role = $this->roleModel::create([
//            'name' => $request->name,
//            'guard_name' => config('auth.defaults.guard'),
//        ]);
//        $role->syncPermissions(request()->input('permissions', []));
//        $role = Role::create(array_add(request()->all(), 'guard_name', config('auth.defaults.guard')));
//         $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
//         $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
// //        $data['role'] = $role;
//         // $data['role'] = $request->role;
//         $data['roles'] = $roles;
//         $data['permissions'] = $permissions;

//         $rolePermissions = [];
//         foreach ($permissions as $permission){
// //            dd($permission->id);
//             dd($request->permission[$permission->id]);
//             $permission = $this->permissionModel::find($permission->id);
// //            dd($permission);
// //            $permission = $request->permission[$permission->id];
//             $permission = $request->permission;
//             dd($permission);
//             dd($permission);
//             $rolePermissions [] += $permission->name;
//         }
//         dd($rolePermissions);
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;

        return view ('admin.roles.index')->with($data);
    }

    public function editRole($role)
    {
        // TODO: Implement editRole() method.
        // $roles = $this->roleModel::with(['permissions'])->orderBy('id', 'ASC')->paginate(10);
        // $permissions = $this->permissionModel::with(['roles'])->orderBy('id', 'ASC')->get();
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['role'] = $role;
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        return view('admin.roles.edit')->with($data);
    }

    public function updateRole($role, $request)
    {
        // TODO: Implement updateRole() method.
        $role->update([
            'name' => $request->name,
        ]);
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();
        $permission= $request->input('rolePermission');
        foreach($permission as $key=>$val){
            // DB::table('role_has_permissions')->update([
            //     'role_id' =>$role->id,
            //     'permission_id' => $key,
            // ]);
            DB::table('role_has_permissions')->insert([
                'role_id' =>$role->id,
                'permission_id' => $key,
            ]);
        }
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['role'] = $role;
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        return view ('admin.roles.index')->with($data);
    }

    public function deleteRole($role, $request)
    {
        // TODO: Implement deleteRole() method.
        $role->delete();
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $data['roles'] = $roles;
        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return view ('admin.roles.index')->with($data);

    }

    public function assignPermission($permssion)
    {
        // TODO: Implement assignPermission() method.
    }

    public function revokePermission($permssion)
    {
        // TODO: Implement revokePermission() method.
    }

    public function assignRole($role)
    {
        // TODO: Implement assignRole() method.
    }

    public function revokeRole($role)
    {
        // TODO: Implement revokeRole() method.
    }
}
