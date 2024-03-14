<?php

use App\Http\Controllers\Web\AaminController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\MovieController;
use App\Http\Controllers\Web\PermissionController;
use App\Http\Controllers\Web\ReviewController;
use App\Http\Controllers\Web\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('admin.home.index');
});


//Route::prefix('dashboard')->middleware(['can-enter-dashboard'])->group(function(){
Route::prefix('dashboard')->group(function(){

    //Admin Module
    Route::get('admins/', [AaminController::class, 'allAdmins']);
    Route::get('admins/show/{admin}', [AaminController::class, 'showAdmin']);
    Route::get('admins/create', [AaminController::class, 'createAdmin']);
    Route::post('admins/store', [AaminController::class, 'storeAdmin']);
    Route::get('admins/edit/{admin}', [AaminController::class, 'editAdmin']);
    Route::post('admins/update/{admin}', [AaminController::class, 'updateAdmin']);
    Route::get('admins/delete/{admin}', [AaminController::class, 'deleteAdmin']);
    Route::get('admins/restore/{admin}', [AaminController::class, 'restoreAdmin']);
//    Route::get('admins/test/{admin}', [AaminController::class, 'callBack']);


    //Movie Module
    Route::get('movies/', [MovieController::class, 'allMovies']);
    Route::get('movies/show/{movie}', [MovieController::class, 'showMovie']);
    Route::get('movies/create', [MovieController::class, 'createMovie']);
    Route::post('movies/store', [MovieController::class, 'storeMovie']);
    Route::get('movies/edit/{movie}', [MovieController::class, 'editMovie']);
    Route::post('movies/update/{movie}', [MovieController::class, 'updateMovie']);
    Route::get('movies/delete/{movie}', [MovieController::class, 'deleteMovie']);
    Route::get('movies/restore/{movie}', [MovieController::class, 'restoreMovie']);

    //Category Module
    Route::get('categories/', [CategoryController::class, 'allCategories']);
    Route::get('categories/show/{category}', [CategoryController::class, 'showCategory']);
    Route::get('categories/create', [CategoryController::class, 'createCategory']);
    Route::post('categories/store', [CategoryController::class, 'storeCategory']);
    Route::get('categories/edit/{category}', [CategoryController::class, 'editCategory']);
    Route::post('categories/update/{category}', [CategoryController::class, 'updateCategory']);
    Route::get('categories/delete/{category}', [CategoryController::class, 'deleteCategory']);
    Route::get('categories/restore/{category}', [CategoryController::class, 'restoreCategory']);

    //Review Module
    Route::get('reviews/', [ReviewController::class, 'allReviews']);
    Route::get('reviews/show/{review}', [ReviewController::class, 'showReview']);
    Route::get('reviews/create', [ReviewController::class, 'createReview']);
    Route::post('reviews/store', [ReviewController::class, 'storeReview']);
    Route::get('reviews/edit/{review}', [ReviewController::class, 'editReview']);
    Route::post('reviews/update/{review}', [ReviewController::class, 'updateReview']);
    Route::get('reviews/delete/{review}', [ReviewController::class, 'deleteReview']);
//    Route::get('reviews/restore/{review}', [ReviewController::class, 'restoreReview']);


    //Review Module
    Route::get('roles/', [RoleController::class, 'allRoles']);
    Route::get('roles/show/{role}', [RoleController::class, 'showRole']);
    Route::get('roles/create', [RoleController::class, 'createRole']);
    Route::post('roles/store', [RoleController::class, 'storeRole']);
    Route::get('roles/edit/{role}', [RoleController::class, 'editRole']);
    Route::post('roles/update/{role}', [RoleController::class, 'updateRole']);
    Route::get('roles/delete/{role}', [RoleController::class, 'deleteRole']);


    //Review Module
    Route::get('permissions/', [PermissionController::class, 'allPermissions']);
    Route::get('permissions/show/{permission}', [PermissionController::class, 'showPermission']);
});
