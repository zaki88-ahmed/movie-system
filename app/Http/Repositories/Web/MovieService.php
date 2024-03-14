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

class MovieService extends BaseRepository implements MovieInterface {
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



    public function allMovies()
    {
        // TODO: Implement allMovies() method.
//        $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'ASC')->paginate(10);
//        dd($movies);
//        $movies = Movie::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['movies'] = $movies;
        return view ('admin.movies.index')->with($data);
    }

    public function showMovie($movie)
    {
        // TODO: Implement showMovie() method.
        $data['movie'] = $movie;
////        dd($project->id);
        return view('admin.movies.show')->with($data);
    }

    public function createMovie($request)
    {
        // TODO: Implement createMovie() method.
        return view("admin.movies.create");

    }

    public function storeMovie($request)
    {
        // TODO: Implement storeMovie() method.
//        dd($request->all());
        $movie = $this->movieModel::create([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
                ],
            'summary' => [
                'en' => $request->summary_en,
                'ar' => $request->summary_ar,
            ],
            'duration' => $request->duration,
            'launched_year' => $request->launched_year,
            'isFree' => $request->isFree,
        ]);

        if($request->media){
//            dd($request->media->getClientOriginalExtension());
//            dd($request->media);
            $this->CreateMediaTrait($request->media, $movie, '/movie_medias');

        }
        $data['movie'] = $movie;
        $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['movies'] = $movies;
        return view ('admin.movies.index')->with($data);
    }

    public function editMovie($movie)
    {
        // TODO: Implement editMovie() method.
        $data['movie'] = $movie;
        return view('admin.movies.edit')->with($data);
    }

    public function updateMovie($movie, $request)
    {
        // TODO: Implement updateMovie() method.
//        dd($movie);
        $movie->update([
            'title' => [
                'en' => $request->title_en,
                'ar' => $request->title_ar,
            ],
            'summary' => [
                'en' => $request->summary_en,
                'ar' => $request->summary_ar,
            ],
            'duration' => $request->duration,
            'launched_year' => $request->launched_year,
            'isFree' => $request->isFree,
        ]);

        if($request->media){

            $this->DeleteMediaTrait($movie->id, $this->mediaModel);
            $this->CreateMediaTrait($request->media, $movie, '/movie_medias');
        }

        $data['movie'] = $movie;
        $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['movies'] = $movies;
//        return view ('admin.movies.index')->with($data);
        return view ('admin.movies.show')->with($data);
    }

    public function deleteMovie($movie, $request)
    {
        // TODO: Implement deleteMovie() method.
        $this->DeleteMediaTrait($movie->id, $this->mediaModel);
        $movie->delete();
        $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
        $data['movies'] = $movies;
        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return view ('admin.movies.index')->with($data);
    }

    public function restoreMovie($movie, $request)
    {
        // TODO: Implement restoreMovie() method.
//        dd($admin);
        if (!is_null($movie->deleted_at)) {
            $movie->restore();
            $movies = $this->movieModel::withTrashed()->with(['categories', 'reviews', 'medias'])->orderBy('id', 'DESC')->paginate(10);
            $data['movies'] = $movies;
            $msg = 'row restored successfully';
            $request->session()->flash('msg', $msg);
        }
//        $admin = $this->adminModel::withTrashed()->find($admin->id);
//        $admin = DB::table('admins')->Where('id',$admin->id)->first();
//        dd($admin->trashed());
        return view ('admin.movies.index')->with($data);
    }
}
