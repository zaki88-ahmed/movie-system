<?php
namespace App\Http\Repositories\Web;


interface CategoryInterface {

    public function allCategories();

    public function showCategory($category);

    public function createCategory($request);

    public function storeCategory($request);

    public function editCategory($category);

    public function updateCategory($category, $request);

    public function deleteCategory($category, $request);
    public function restoreCategory($category, $request);

}
