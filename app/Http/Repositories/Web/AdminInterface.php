<?php
namespace App\Http\Repositories\Web;


interface AdminInterface {

    public function allAdmins();

    public function showAdmin($admin);

    public function createAdmin($request);

    public function storeAdmin($request);

    public function editAdmin($admin);

    public function updateAdmin($admin, $request);

    public function deleteAdmin($admin, $request);
    public function restoreAdmin($admin, $request);

}
