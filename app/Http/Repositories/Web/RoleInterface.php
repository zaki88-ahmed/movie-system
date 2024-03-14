<?php
namespace App\Http\Repositories\Web;


interface RoleInterface {

    public function allRoles();

    public function showRole($role);

    public function createRole($request);

    public function storeRole($request);

    public function editRole($role);

    public function updateRole($role, $request);

    public function deleteRole($role, $request);
    public function assignPermission($permssion);
    public function revokePermission($permssion);
    public function assignRole($role);
    public function revokeRole($role);

}
