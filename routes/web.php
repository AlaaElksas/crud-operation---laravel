<?php

use App\Http\Controllers\userController;
use App\Models\posts;
use App\Models\profiles;
use App\Models\User;
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

Route::get('getprofile/{id}', function($id){

    $profile = User::where('id', $id)->with('profile')->first();

    dd($profile->toArray());
});

Route::get('getuser/{id}', function ($id){
    $user = profiles::where('id', $id)->with('user')->first();

    dd($user->toArray());
});

Route::get('getposts/{id}', function($id){
    $posts = User::where('id', $id)->with('posts')->first();

    foreach($posts->posts as $post){
        echo "$post->post_description; . <br>";
    }
});

Route::get('user/{id}', function($id){
    $user = posts::where('id', $id)->with('user')->first();

    dd($user->toArray());
});

// using user controller
//users routes
Route::get('usersTable', [userController::class, 'view'])->name('Users.table');
Route::get('editUser/{id}', [userController::class, 'editUser']);
Route::post('saveUser', [userController::class, 'storeUser']);
Route::get('deleteUser/{user_id}', [userController::class, 'deleteUser']);
Route::get('addUser', [userController::class, 'addUser'])->name('User.Add');
Route::post('saveNewUser', [userController::class, 'saveNewUser'])->name('Save.New.User');

// profile routes
Route::get('profile/{id}', [userController::class, 'viewProfile']);
Route::get('makeProfile/{id}', [userController::class, 'makeProfile'])->name('profile.make');
Route::post('saveProfile/{id}', [userController::class, 'saveProfile'])->name('profile.save');

// posts routes
Route::get('posts/{id}', [userController::class, 'viewPosts']);
Route::get('addPost/{id}', [userController::class, 'addPosts']);
Route::post('postStore', [userController::class, 'storePosts']);
Route::get('editPost/{user_id}/{post_id}', [userController::class, 'editPost']);
Route::post('postSave', [userController::class, 'postSave']);
Route::get('deletePost/{user_id}/{post_id}', [userController::class, 'deletePost']);

