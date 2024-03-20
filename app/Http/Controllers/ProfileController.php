<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return Response()->json($profiles, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $profile = Profile::create([
            'userId' =>$request->input("userId"),
            'nickname' =>$request->input("nickname"),
            'livingIn' =>$request->input("livingIn"),
            'aboutme' =>$request->input("aboutme"),
            'photo' =>$request->input("photo"),
            'education' =>$request->input("education"),
            'job' =>$request->input("job"),
            'salary' =>$request->input("salary"),
            'willing2relocate' =>$request->input("willing2relocate"),
            'profilepostedby' =>$request->input("profilepostedby"),
            'maritalstatus' =>$request->input("maritalstatus"),
            'noofmarriages' =>$request->input("noofmarriages"),
            'children' =>$request->input("children"),
            'kids_staying_at' =>$request->input("kids_staying_at"),
            'like_to_have_children' =>$request->input("like_to_have_children"),
            'polygyny' =>$request->input("polygyny"),
            'health' =>$request->input("health"),
            'pray' =>$request->input("pray"),
            'languages' =>$request->input("languages"),
            'origin' =>$request->input("origin"),
            'haircolor' =>$request->input("haircolor"),
            'bodytype' =>$request->input("bodytype"),
            'height' =>$request->input("height"),
            'dresscode' =>$request->input("dresscode"),
            'l4_atoll' =>$request->input("l4_atoll"),
            'l4_island' =>$request->input("l4_island"),
            'l4_age_range_start' =>$request->input("l4_age_range_start"),
            'l4_age_range_end' =>$request->input("l4_age_range_end"),
            'l4_willing2relocate' =>$request->input("l4_willing2relocate"),
            'l4_maritalstatus' =>$request->input("l4_maritalstatus"),
            'l4_noofmarriages' =>$request->input("l4_noofmarriages"),
            'l4_children' =>$request->input("l4_children"),
            'l4_kids_staying_at' =>$request->input("l4_kids_staying_at"),
            'l4_like_to_have_children' =>$request->input("l4_like_to_have_children"),
            'l4_poligyny' =>$request->input("l4_poligyny"),
            'l4_languages' =>$request->input("l4_languages"),
            'l4_pray' =>$request->input("l4_pray"),
            'l4_origin' =>$request->input("l4_origin"),
            'l4_haircolor' =>$request->input("l4_haircolor"),
            'l4_bodytype' =>$request->input("l4_bodytype"),
            'l4_height' =>$request->input("l4_height"),
            'l4_dresscode' =>$request->input("l4_dresscode"),
            'l4_profession' =>$request->input("l4_profession"),
            'l4_minimum_qualification' =>$request->input("l4_minimum_qualification"),
            'l4_other' =>$request->input("l4_other")
        ]);
        return response()->json([
            'created_profile' => $profile
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
