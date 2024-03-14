<?php
namespace App\Http\Repositories\Web;


interface PermissionInterface {

    public function allPermissions();

    public function showPermission($permission);

}
