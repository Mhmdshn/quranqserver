<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaveRequest;
use App\Http\Requests\UpdateSaveRequest;

class SaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saves = Save::all();
        return Response()->json($saves, 200);
    }

    public function getSavedFrom($id)
{
    $saved = Save::where('saveFrom', $id)->get();
    if ($saved->count() === 0) {
        return response()->json(['found' => false, 'saved' => $saved], 400);
    }
    $saveToValues = $saved->pluck('saveTo');
    return response()->json(['found' => true, 'savedTo' => $saveToValues], 200);
}

    public function checkIsSaved($uid, $tid)
    {
        $saveFrom = $uid;
        $saveTo = $tid;

        // Check if the record already exists
        $check = Save::where('saveFrom', $saveFrom)
                    ->where('saveTo', $saveTo)
                    ->first();

        if (!$check) {
            // Record does not exist, create a new one

            return response()->json([
                'saved' => false
            ], 200);
        }

        // Record already exists, return a response indicating that
        return response()->json(['saved' => true], 205);
    }


    // public function checkIfSaved(Request $request)
    // {
    //     $post = Save::where([
    //         'saveFrom' => $request->input('saveFrom'),
    //         'saveTo' => $request->input('saveTo')
    //     ])->first();
    //     if (!$post) {
    //         return response()->json(['found'=>false], 400);
    //     }
    //     return response()->json(['found'=>true, $post], 200);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $saveFrom = $request->input('saveFrom');
    $saveTo = $request->input('saveTo');

    // Check if the record already exists
    $check = Save::where('saveFrom', $saveFrom)
                  ->where('saveTo', $saveTo)
                  ->first();

    if (!$check) {
        // Record does not exist, create a new one
        $post = Save::create([
            'saveFrom'      => $saveFrom,
            'saveTo'        => $saveTo,
            'created_at'    => now()
        ]);

        return response()->json([
            'created_post' => $post
        ], 200);
    }

    // Record already exists, return a response indicating that
    return response()->json(['found' => true, 'existing_post' => $check], 205);
}


public function delete(Request $request)
{
    $saveFrom = $request->input('saveFrom');
    $saveTo = $request->input('saveTo');

    // Check if the record already exists
    $check = Save::where('saveFrom', $saveFrom)
                  ->where('saveTo', $saveTo)
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
    public function store(StoreSaveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Save $save)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Save $save)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaveRequest $request, Save $save)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Save $save)
    {
        
    }
}
