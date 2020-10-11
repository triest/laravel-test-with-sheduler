<?php

    use App\Article;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LikeController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get(
            '/',
            function () {
                return view('welcome');
            }
    );

    Auth::routes();

    Route::get('/articles', 'HomeController@index')->name('home');

    Route::get(
            'articles/{slug}',
            [HomeController::class, 'view']
    )->name('articleItem');

    Auth::routes();

    Route::get("log", 'HomeController@log');


    Route::prefix('articles')->group(
            function () {
                Route::post('{slug}/comment/post', [CommentController::class, 'add'])->middleware('auth');
                Route::post('{slug}/like', [LikeController::class, 'newLike'])->middleware('auth');
            }
    );

