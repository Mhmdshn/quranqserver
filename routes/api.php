<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LiveController;

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

Route::get('/live', [LiveController::class, 'index']);
Route::post('/live/create', [LiveController::class, 'create']);



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