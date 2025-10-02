<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;
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

//Route::get('/', [MyPlaceController::class,'index']);

Route::group(['namespace' => 'Post'], function () {;

    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');

    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{posts}', 'ShowController')->name('post.show');
    Route::get('/posts/{posts}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{posts}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{posts}', 'DestroyController')->name('post.delete');

});

Route::get('/', [MainController::class,'index'])->name('main.index');
Route::get('/contacts', [ContactsController::class,'index'])->name('contact.index');
Route::get('/about', [AboutController::class,'index'])->name('about.index');


