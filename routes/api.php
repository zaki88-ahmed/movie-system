<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('customer/register',  [AuthController::class, 'register']);
Route::post('customer/login',  [AuthController::class, 'login']);
Route::post('customer/logout',  [AuthController::class, 'logout']);


Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('customer/updateProfile', [CustomerController::class, 'updateProfile']);
        Route::post('customer/updateProfilePhoto', [CustomerController::class, 'updateProfilePhoto']);
        Route::post('customer/checkHistory', [CustomerController::class, 'checkHistory']);
        Route::post('customer/clearHistory', [CustomerController::class, 'clearHistory']);
        Route::post('customer/clearSingleHistory', [CustomerController::class, 'clearSingleHistory']);
        Route::get('customer/showAllCategories', [CustomerController::class, 'showAllCategories']);
        Route::post('customer/categoryMovies', [CustomerController::class, 'categoryMovies']);
        Route::post('customer/movieFreeOrPaid', [CustomerController::class, 'movieFreeOrPaid']);
        Route::post('customer/movieDetails', [CustomerController::class, 'movieDetails']);
        Route::post('customer/watchFreeMovie', [CustomerController::class, 'watchFreeMovie']);
        Route::post('customer/createUserMovie', [CustomerController::class, 'createUserMovie']);
//        Route::post('customer/recommendedMovie', [CustomerController::class, 'recommendedMovie']);


        Route::post('customer/createReview', [ReviewController::class, 'createReview']);
        Route::post('customer/editReview', [ReviewController::class, 'editReview']);
        Route::post('customer/deleteReview', [ReviewController::class, 'deleteReview']);
        Route::post('customer/allReviews', [ReviewController::class, 'allReviews']);

});
