<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postslist(Request $request)
{
    $posts = Post::where('isPublic', 1)->orderBy('created_at', 'desc')->pluck('userId')->toArray();

    // Paginate the array
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 5;
    $currentPageItems = array_slice($posts, ($currentPage - 1) * $perPage, $perPage);

    $paginatedItems = new LengthAwarePaginator($currentPageItems, count($posts), $perPage);
    $paginatedItems->setPath($request->url());

    return response()->json($paginatedItems, 200);
}

    public function publicposts(Request $request){
        $posts = Post::where('isPublic', 1)
            ->orderBy('created_at', 'desc')->paginate(5);
        return response()->json($posts, 200);
    }

     public function list(Request $request)
    {
        $posts = Post::with(['user']);
        if($request->uid){
            $results = $posts->where('userId', '=', $request->uid);
            return Response()->json($results, 200);
        }
   

        $results = $posts->paginate(5);
        return Response()->json($results, 200);
    }


    public function geAllPosts()
    {
        $posts = Post::all();
        return Response()->json($posts, 200);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function getPostById($id)
    {
        $specificPost = Post::where('userId', $id)->first();
        if (!$specificPost) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($specificPost, 200);
    }

    public function getPostByIdQuery(Request $request)
    {
        $postId = $request->query('id');
        $specificPost = Post::find($postId);
        if (!$specificPost) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($specificPost, 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Create a new post
        $post = Post::create([
            'userId'    => $request->input('userId'),
            'nickname'  => $request->input('nickname'),
            'gender'    => $request->input('gender'),
            'age'       => $request->input('age'),
            'aboutme'   => $request->input('aboutme'),
            'livingIn'  => $request->input('livingIn'),
            'isPublic'  => $request->input('isPublic'),
            'created_at' => now(),
        ]);
        return response()->json([
            'created_post' => $post
        ], 200);
    }

    public function makePublic(Request $request)
    {
        // Create a new post
        $post = Post::where('userId', $request->input('userId'))
            ->update([
                'isPublic' => $request->input('isPublic')
            ]);
        return response()->json([
            'updated_post' => $post
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
