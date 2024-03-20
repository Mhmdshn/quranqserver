<?php

use App\Http\Controllers\AskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\PublicDatasController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrantController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', function (Request $request) {
    $datas = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => 'salaam'
    ];

    return response()->json($datas, 200);
});

// Route::get('/getall', function () {
//     $allPosts = Post::all();
//     return response()->json($allPosts, 200);
// });

Route::post('auth', [AuthController::class, 'auth']);

Route::get('/postslist', [PostController::class, 'postslist']);
Route::get('/posts', [PostController::class, 'publicposts']);
Route::get('/post/{id}', [PostController::class, 'getPostById']);
Route::get('/post', [PostController::class, 'getPostByIdQuery']);  // /post?id=2
Route::post('post/create', [PostController::class, 'create']);
Route::post('post/makepublic', [PostController::class, 'makePublic']);


Route::get('users', [UserController::class, 'index']);

Route::get('getuserbyemail/{email}', [UserController::class, 'getUserByEmail']);
Route::post('user/create', [UserController::class, 'create']);


Route::get('publicdatas', [PublicDatasController::class, 'index']);
Route::get('publicdata/{id}', [PublicDatasController::class, 'getById']);

Route::get('likes', [LikeController::class, 'index']);
Route::post('like/create', [LikeController::class, 'create']);
Route::get('like/check/{uid}/{cid}', [LikeController::class, 'checkIsLiked']);

Route::get('profiles', [ProfileController::class, 'index']);
Route::get('profile/{id}', [ProfileController::class, 'getById']);
Route::post('profile/create', [ProfileController::class, 'create']);

Route::get('saves', [SaveController::class, 'index']);
Route::get('save/savefrom/{id}', [SaveController::class, 'getSavedFrom']);
Route::post('save/create', [SaveController::class, 'create']);
// Route::post('save/check', [SaveController::class, 'checkIfSaved']);
Route::post('save/delete', [SaveController::class, 'delete']);
Route::get('save/check/{uid}/{cid}', [SaveController::class, 'checkIsSaved']);

Route::get('asks', [AskController::class, 'getAsks']);
Route::get('askfrom/{id}', [AskController::class, 'getAskFrom']);
Route::get('askto/{id}', [AskController::class, 'getAskTo']);
Route::post('ask/create', [AskController::class, 'createAsk']);
Route::post('ask/delete', [AskController::class, 'delete']);

Route::get('grants', [GrantController::class, 'getGrants']);
Route::get('grantfrom/{id}', [GrantController::class, 'getGrantFrom']);
Route::get('grantto/{id}', [GrantController::class, 'getGrantTo']);
Route::post('grant/create', [GrantController::class, 'createGrant']);
Route::post('grant/delete', [GrantController::class, 'delete']);


// Retrieve a specific post by ID
// Route::get('/post/{id}', function ($id) {
//     $specificPost = Post::find($id);
//     if (!$specificPost) { return response()->json(['error' => 'Post not found'], 404);}
//     return response()->json($specificPost, 200);
// });

// Retrieve a specific post by ID    eg:  /getpostbyid?id=2
// Route::get('/getpostbyid', function (Request $request) {
//     $postId = $request->query('id');
//     $specificPost = Post::find($postId);
//     if (!$specificPost) {return response()->json(['error' => 'Post not found'], 404);}
//     return response()->json($specificPost, 200);
// });


// Route::get('/createpost', function () {
//     // Create a new post
//     $post = Post::create([
//         'desc' => 'Example Post',
//         'img' => 'This is an example post content.',
//         'userId' => 2
//         ]);
//     return response()->json([
//         'created_post' => $post],200);
// });