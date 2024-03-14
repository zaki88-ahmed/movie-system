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
use App\Models\Role;
use App\Models\Permission;

class AdminService extends BaseRepository implements AdminInterface {
    use ApiDesignTrait;

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





    public function allAdmins()
    {
        // TODO: Implement allAdmins() method.
        $admins = $this->adminModel::withTrashed()->with(['user'])->orderBy('id', 'DESC')->paginate(10);
        $data['admins'] = $admins;
        return view ('admin.admins.index')->with($data);
    }

    public function showAdmin($admin)
    {
        // TODO: Implement showAdmin() method.
        $data['admin'] = $admin;
//        dd($project->id);
        return view('admin.admins.show')->with($data);
    }

    public function createAdmin($request)
    {
        // TODO: Implement createAdmin() method.
        return view("admin.admins.create");
    }

    public function storeAdmin($request)
    {
        // TODO: Implement storeAdmin() method.
        $user = $this->userModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
        ]);

        $admin = $this->adminModel::create([
            'salary' => $request->salary,
            'user_id' => $user->id,
        ]);
//        dd($user->email);
//        $user->assignRole('admin');
        if($user){
            Mail::to($user->email)->send(new ContactResponseMail($user));
        }
        $data['admin'] = $admin;
        $admins = $this->adminModel::withTrashed()->with(['user'])->orderBy('id', 'DESC')->paginate(10);
        $data['admins'] = $admins;
        return view ('admin.admins.index')->with($data);
    }

    public function editAdmin($admin)
    {
        // TODO: Implement editAdmin() method.
        $data['admin'] = $admin;
        $roles = $this->roleModel::orderBy('id', 'ASC')->paginate(10);
        $permissions = $this->permissionModel::orderBy('id', 'ASC')->get();
        $data['roles'] = $roles;
        $data['permissions'] = $permissions;
        return view('admin.admins.edit')->with($data);
    }

    public function updateAdmin($admin, $request)
    {
        // TODO: Implement updateAdmin() method.
//        dd($admin->user_id);
        $user = $this->userModel::find($admin->user_id);
//        dd($user);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin = $admin->update([
            'salary' => $request->salary,
            'isSuperAdmin' => $request->isSuperAdmin,
        ]);



        // DB::table('model_has_roles')->where('role_id', $role->id)->delete();

        DB::table('model_has_roles')->where('model_id', $user->id)->update([
            'role_id' =>$request->role_id,
        ]);


        // $role->update([
        //     'name' => $request->name,
        // ]);
        // DB::table('role_has_permissions')->where('role_id', $role->id)->delete();
        // $permission= $request->input('rolePermission');
        // foreach($permission as $key=>$val){
        //     // DB::table('role_has_permissions')->update([
        //     //     'role_id' =>$role->id,
        //     //     'permission_id' => $key,
        //     // ]);
        //     DB::table('role_has_permissions')->insert([
        //         'role_id' =>$role->id,
        //         'permission_id' => $key,
        //     ]);
        // }




//        dd($user->email);
//        $user->assignRole('admin');
        $data['admin'] = $admin;
        $admins = $this->adminModel::withTrashed()->with(['user'])->orderBy('id', 'DESC')->paginate(10);
        $data['admins'] = $admins;
        return view ('admin.admins.index')->with($data);
    }

    public function deleteAdmin($admin, $request)
    {
        // TODO: Implement deleteAdmin() method.
        $admin->delete();
        $admins = $this->adminModel::withTrashed()->with(['user'])->orderBy('id', 'DESC')->paginate(10);
        $data['admins'] = $admins;
        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return view ('admin.admins.index')->with($data);
    }

    public function restoreAdmin($admin, $request)
    {
        // TODO: Implement restoreAdmin() method.
//        dd('cc');
        $admin = $this->adminModel::withTrashed()->find($admin->id);
        $admin = $this->adminModel::withTrashed()->first();
//        dd($admin);
        if (!is_null($admin->deleted_at)) {
            $admin->restore();
            $admins = $this->adminModel::withTrashed()->with(['user'])->orderBy('id', 'DESC')->paginate(10);
            $data['admins'] = $admins;
            $msg = 'row restored successfully';
            $request->session()->flash('msg', $msg);
        }
//        $admin = $this->adminModel::withTrashed()->find($admin->id);
//        $admin = DB::table('admins')->Where('id',$admin->id)->first();
//        dd($admin->trashed());
        return view ('admin.admins.index')->with($data);
    }
}
