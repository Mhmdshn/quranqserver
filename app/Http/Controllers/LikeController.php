<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $likes = Like::all();
        return Response()->json($likes, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $likeFrom = $request->input('likeFrom');
        $likeTo = $request->input('likeTo');
    
        // Check if the record already exists
        $check = Like::where('likeFrom', $likeFrom)
                      ->where('likeTo', $likeTo)
                      ->first();
    
        if (!$check) {
            // Record does not exist, create a new one
            $post = Like::create([
                'likeFrom'      => $likeFrom,
                'likeTo'        => $likeTo,
                'created_at'    => now()
            ]);
    
            return response()->json([
                'created_like' => $post
            ], 200);
        }
    
        // Record already exists, return a response indicating that
        return response()->json(['found' => true, 'existing_post' => $check], 205);
    }

    public function checkIsLiked($uid, $tid)
    {
        $likeFrom = $uid;
        $likeTo = $tid;
    
        // Check if the record already exists
        $check = Like::where('likeFrom', $likeFrom)
                      ->where('likeTo', $likeTo)
                      ->first();
    
        if (!$check) {
            // Record does not exist, create a new one
 
            return response()->json([
                'liked' => false
            ], 200);
        }
    
        // Record already exists, return a response indicating that
        return response()->json(['liked' => true], 205);
    }
    

    // public function checkIsLiked(Request $request)
    // {
    //     $likeFrom = $request->input('likeFrom');
    //     $likeTo = $request->input('likeTo');
    
    //     // Check if the record already exists
    //     $check = Like::where('likeFrom', $likeFrom)
    //                   ->where('likeTo', $likeTo)
    //                   ->first();
    
    //     if (!$check) {
    //         // Record does not exist, create a new one
 
    //         return response()->json([
    //             'liked' => true
    //         ], 200);
    //     }
    
    //     // Record already exists, return a response indicating that
    //     return response()->json(['liked' => false], 205);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
