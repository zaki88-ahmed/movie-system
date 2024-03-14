<?php

namespace App\Http\Controllers\Web;

use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Repositories\Web\AdminInterface;
use App\Http\Repositories\Web\CategoryInterface;
use App\Http\Repositories\Web\MovieInterface;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Movie;
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



class CategoryController extends Controller
{


    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }
    public function allCategories()
    {
        return $this->categoryInterface->allCategories();
    }


    public function showCategory(Category $category)
    {
//        dd($project);
        return $this->categoryInterface->showCategory($category);
    }



    public function createCategory(Request $request)
    {
        return $this->categoryInterface->createCategory($request);
    }


    public function storeCategory(Request $request)
    {
        return $this->categoryInterface->storeCategory($request);
    }


    public function editCategory(Category $category)
    {
//        dd($project);
        return $this->categoryInterface->editCategory($category);
    }


    public function updateCategory(Category $category, Request $request)
    {
        return $this->categoryInterface->updateCategory($category, $request);
    }


    public function deleteCategory(Category $category, Request $request)
    {
        return $this->categoryInterface->deleteCategory($category, $request);
    }

    public function restoreCategory(Category $category, Request $request)
    {
        return $this->categoryInterface->restoreCategory($category, $request);
    }



}
