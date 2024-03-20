<?php

namespace App\Http\Controllers;

use App\Models\Ask;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAskRequest;
use App\Http\Requests\UpdateAskRequest;

class AskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAsks()
    {
        $asked = Ask::all();
        return Response()->json($asked, 200);
    }

    public function getAskFrom($id)
    {
        $asked = Ask::where(['askFrom' => $id])->get();
          $asked->each(function ($item) {
            $userNickname = Post::where('userId', $item->askTo)->value('nickname');
            $item->nickname = $userNickname;
        });

        return Response()->json($asked, 200);
    }

    public function getAskTo($id)
    {
        $asked = Ask::where(['askTo' => $id])->get();
          $asked->each(function ($item) {
            $userNickname = Post::where('userId', $item->askFrom)->value('nickname');
            $item->nickname = $userNickname;
        });

        return Response()->json($asked, 200);
    }

    public function index()
    {
        //
    }


     public function createAsk(Request $request)
     {
         $askFrom = $request->input('askFrom');
         $askTo = $request->input('askTo');
     
         // Check if the record already exists
         $check = Ask::where('askFrom', $askFrom)
                       ->where('askTo', $askTo)
                       ->first();
     
         if (!$check) {
             // Record does not exist, create a new one
             $post = Ask::create([
                 'askFrom'      => $askFrom,
                 'askTo'        => $askTo,
                 'created_at'    => now()
             ]);
     
             return response()->json([
                 'created_ask' => $post
             ], 200);
         }
     
         // Record already exists, return a response indicating that
         return response()->json(['found' => true, 'existing_post' => $check], 205);
     }


     public function delete(Request $request)
{
    $askFrom = $request->input('askFrom');
    $askTo = $request->input('askTo');

    // Check if the record already exists
    $check = Ask::where('askFrom', $askFrom)
                  ->where('askTo', $askTo)
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
    public function store(StoreAskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ask $ask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ask $ask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAskRequest $request, Ask $ask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ask $ask)
    {
        //
    }
}
