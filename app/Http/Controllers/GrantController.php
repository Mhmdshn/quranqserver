<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrantRequest;
use App\Http\Requests\UpdateGrantRequest;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function getGrants()
    {
        $granted = Grant::all();
        return Response()->json($granted, 200);
    }

    public function getGrantFrom($id)
    {
        $granted = Grant::where(['grantFrom' => $id])->get();
          $granted->each(function ($item) {
            $userNickname = Post::where('userId', $item->grantTo)->value('nickname');
            $item->grantfromnickname = $userNickname;
        });

        return Response()->json($granted, 200);
    }

    public function getGrantTo($id)
    {
        $granted = Grant::where(['grantTo' => $id])->get();
          $granted->each(function ($item) {
            $userNickname = Post::where('userId', $item->grantFrom)->value('nickname');
            $item->grantfromnickname = $userNickname;
        });

        return Response()->json($granted, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createGrant(Request $request)
     {
         $grantFrom = $request->input('grantFrom');
         $grantTo = $request->input('grantTo');
     
         // Check if the record already exists
         $check = Grant::where('grantFrom', $grantFrom)
                       ->where('grantTo', $grantTo)
                       ->first();
     
         if (!$check) {
             // Record does not exist, create a new one
             $post = Grant::create([
                 'grantFrom'      => $grantFrom,
                 'grantTo'        => $grantTo,
                 'created_at'    => now()
             ]);
     
             return response()->json([
                 'created_grant' => $post
             ], 200);
         }
     
         // Record already exists, return a response indicating that
         return response()->json(['found' => true, 'existing_post' => $check], 205);
     }



     public function delete(Request $request)
     {
         $grantFrom = $request->input('grantFrom');
         $grantTo = $request->input('grantTo');
     
         // Check if the record already exists
         $check = Grant::where('grantFrom', $grantFrom)
                       ->where('grantTo', $grantTo)
                       ->first();
     
         if (!$check) {
             return response()->json(['found' => false, 'status' => $check], 205);
         }
     
         // Record already exists, return a response indicating that
         $check->delete();
         return response()->json([
                 'found' => true,
                 'removed_item' => $check
             ], 200);
     
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGrantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGrantRequest $request, Grant $grant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        //
    }
}
