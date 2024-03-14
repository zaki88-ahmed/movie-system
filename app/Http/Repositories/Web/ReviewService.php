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
use App\Models\Review;
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

class ReviewService implements ReviewInterface {
    use ApiDesignTrait, CreateMediaTrait, DeleteMediaTrait;

    private $userModel;
    private $customerModel;
    private $adminModel;
    private $reviewModel;
    private $movieModel;
    private $mediaModel;
    public function __construct(User $user, Customer $customer, Admin $admin, Review $review, Movie $movie, Media $media) {

        $this->userModel = $user;
        $this->customerModel = $customer;
        $this->adminModel = $admin;
        $this->reviewModel = $review;
        $this->movieModel = $movie;
        $this->mediaModel = $media;
    }



    public function allReviews()
    {
        // TODO: Implement allReviews() method.
        $reviews = $this->reviewModel::with(['movie'])->orderBy('id', 'ASC')->paginate(10);
        $data['reviews'] = $reviews;
        return view ('admin.reviews.index')->with($data);
    }

    public function showReview($review)
    {
        // TODO: Implement showReview() method.
        $data['review'] = $review;
        return view('admin.reviews.show')->with($data);
    }

    public function createReview($request)
    {
        // TODO: Implement createReview() method.
        $users = $this->userModel::withTrashed()->orderBy('id', 'ASC')->paginate(10);
        $movies = $this->movieModel::withTrashed()->orderBy('id', 'ASC')->paginate(10);
        $stars = [1, 2, 3, 4, 5];
        $data['stars'] = $stars;
        $data['users'] = $users;
        $data['movies'] = $movies;
        return view("admin.reviews.create")->with($data);
    }

    public function storeReview($request)
    {
        // TODO: Implement storeReview() method.
        $review = $this->reviewModel::create([
            'stars' => $request->stars,
            'comment' => $request->comment,
            'is_hidden' => $request->is_hidden,
            'user_id' => $request->user_id,
            'movie_id' => $request->movie_id,
        ]);
//        dd($request->user_id);
//        dd($request->movie_id);

        $data['review'] = $review;
        $reviews = $this->reviewModel::with(['movie'])->orderBy('id', 'ASC')->paginate(10);
        $data['reviews'] = $reviews;
        return view ('admin.reviews.index')->with($data);
    }

    public function editReview($review)
    {
        // TODO: Implement editReview() method.
        $users = $this->userModel::withTrashed()->orderBy('id', 'ASC')->paginate(10);
        $movies = $this->movieModel::withTrashed()->orderBy('id', 'ASC')->paginate(10);
        $stars = [1, 2, 3, 4, 5];
        $data['stars'] = $stars;
        $data['users'] = $users;
        $data['movies'] = $movies;
        $data['review'] = $review;
        return view('admin.reviews.edit')->with($data);
    }

    public function updateReview($review, $request)
    {
        // TODO: Implement updateReview() method.
        $review->update([
            'stars' => $request->stars,
            'comment' => $request->comment,
            'is_hidden' => $request->is_hidden,
            'user_id' => $request->user_id,
            'movie_id' => $request->movie_id,
//        $request->all()
        ]);
//        dd($request->all());

        $data['review'] = $review;
        $reviews = $this->reviewModel::with(['movie'])->orderBy('id', 'ASC')->paginate(10);
        $data['reviews'] = $reviews;
        return view ('admin.reviews.index')->with($data);
    }

    public function deleteReview($review, $request)
    {
        // TODO: Implement deleteReview() method.
        $review->delete();
        $reviews = $this->reviewModel::with(['movie'])->orderBy('id', 'ASC')->paginate(10);
        $data['reviews'] = $reviews;
        $msg = 'row deleted successfully';
        $request->session()->flash('msg', $msg);

        return view ('admin.reviews.index')->with($data);
    }

//    public function restoreReview($review, $request)
//    {
//        // TODO: Implement restoreReview() method.
//        if (!is_null($review->deleted_at)) {
//            $review->restore();
//            $reviews = $this->reviewModel::withTrashed()->with(['movies'])->orderBy('id', 'ASC')->paginate(10);
//            $data['reviews'] = $reviews;
//            $msg = 'row restored successfully';
//            $request->session()->flash('msg', $msg);
//        }
//        return view ('admin.reviews.index')->with($data);
//    }
}
