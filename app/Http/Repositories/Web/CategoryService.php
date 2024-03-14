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

class CategoryService implements CategoryInterface {
    use ApiDesignTrait, CreateMediaTrait, DeleteMediaTrait;

    private $userModel;
    private $customerModel;
    private $adminModel;
    private $categoryModel;
    private $movieModel;
    private $mediaModel;
    public function __construct(User $user, Customer $customer, Admin $admin, Category $category, Movie $movie, Media $media) {

        $this->userModel = $user;
        $this->customerModel = $customer;
        $this->adminModel = $admin;
        $this->categoryModel = $category;
        $this->movieModel = $movie;
        $this->mediaModel = $media;
    }



    public function allCategories()
    {
        // TODO: Implement allCategories() method.
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'ASC')->paginate(10);
        $data['categories'] = $categories;
        return view ('admin.categories.index')->with($data);
    }

    public function showCategory($category)
    {
        // TODO: Implement showCategory() method.
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'ASC')->paginate(10);
        $data['categories'] = $categories;
        $data['category'] = $category;
////        dd($project->id);
        return view('admin.categories.show')->with($data);
    }

    public function createCategory($request)
    {
        // TODO: Implement createCategory() method.
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'ASC')->paginate(10);
        $data['categories'] = $categories;
        return view("admin.categories.create")->with($data);

    }

    public function storeCategory($request)
    {
        // TODO: Implement storeCategory() method.
        $category = $this->categoryModel::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'parent_id' => $request->parent_id,
        ]);
        if($request->media){

            $this->CreateMediaTrait($request->media, $category, '/category_medias');
        }
        $data['category'] = $category;
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['categories'] = $categories;
        return view ('admin.categories.index')->with($data);
    }

    public function editCategory($category)
    {
        // TODO: Implement editCategory() method.
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'ASC')->paginate(10);
        $data['categories'] = $categories;
        $data['category'] = $category;
        return view('admin.categories.edit')->with($data);
    }

    public function updateCategory($category, $request)
    {
        // TODO: Implement updateCategory() method.
        $category->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'parent_id' => $request->parent_id,
        ]);
//        dd($request->parent_id);

        if($request->media){

            $this->DeleteMediaTrait($category->id, $this->mediaModel);
            $this->CreateMediaTrait($request->media, $category, '/category_medias');
        }

        $data['category'] = $category;
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['categories'] = $categories;
        return view ('admin.categories.index')->with($data);
    }

    public function deleteCategory($category, $request)
    {
        // TODO: Implement deleteCategory() method.
        $this->DeleteMediaTrait($category->id, $this->mediaModel);
        $category->delete();
        $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['categories'] = $categories;
        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return view ('admin.categories.index')->with($data);
    }

    public function restoreCategory($category, $request)
    {
        // TODO: Implement restoreCategory() method.
        if (!is_null($category->deleted_at)) {
            $category->restore();
            $categories = $this->categoryModel::withTrashed()->with(['movies', 'medias'])->orderBy('id', 'DESC')->paginate(10);
            $data['categories'] = $categories;
            $msg = 'row restored successfully';
            $request->session()->flash('msg', $msg);
        }
        return view ('admin.categories.index')->with($data);
    }
}
