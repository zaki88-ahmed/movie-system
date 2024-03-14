<?php
namespace App\Http\Repositories\Web;


interface MovieInterface {

    public function allMovies();

    public function showMovie($movie);

    public function createMovie($request);

    public function storeMovie($request);

    public function editMovie($movie);

    public function updateMovie($movie, $request);

    public function deleteMovie($movie, $request);
    public function restoreMovie($movie, $request);

}
