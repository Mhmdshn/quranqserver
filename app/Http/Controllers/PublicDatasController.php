<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\PublicDatas;
use App\Http\Requests\StorePublicDatasRequest;
use App\Http\Requests\UpdatePublicDatasRequest;
use Carbon\Carbon;

class PublicDatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getById($id, Request $request)
    {
        // $userId = $request->query('id');
        $specificPost = $this->getUserDataById($id);
        if (!$specificPost) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($specificPost, 200);
    }


    public function index()
    {
        $usersAndPosts = $this->getPaginatedData();

        return response()->json($usersAndPosts);
    }

    private function getPaginatedData()
    {
        $perPage = 5;
        // Retrieve specific data from the 'users' table and join with 'posts' table
        $combinedData = User::join('posts', 'users.id', '=', 'posts.userId')
            ->leftJoin('likes', 'users.id', '=', 'likes.likeFrom')
            ->select(
                'users.id as userId',
                'users.name as nickname',
                'users.dob',
                'users.gender',
                'posts.aboutme',
                'livingIn',
                'posts.isPublic',
                'posts.created_at',
                'posts.updated_at'
            )
            ->paginate($perPage);

        $combinedData->each(function ($item) {
            $dob = Carbon::parse($item->dob);
            $item->age = $dob->diffInYears(Carbon::now());
            unset($item->dob);
            $item->likeMe =  Like::where('likeTo', $item->userId)->pluck('likeFrom')->toArray();
        });

       

        return $combinedData;
    }

    private function getUserDataById($userId)
    {
        $combinedData = User::join('posts', 'users.id', '=', 'posts.userId')
        ->leftJoin('likes', 'users.id', '=', 'likes.likeFrom')
        ->where('users.id', $userId)
            ->select(
                'users.id as userId',
                'users.name as nickname',
                'users.gender',
                'users.dob',
                'posts.aboutme',
                'livingIn',
                'posts.isPublic',
                'posts.created_at',
                'posts.updated_at'
            )->first();

        if (!$combinedData) {
                // Handle the case where the user is not found
            return null;
        }


        $dob = Carbon::parse($combinedData->dob);
        $combinedData->age = $dob->diffInYears(Carbon::now());
        unset($combinedData->dob);

        $combinedData->likeMe =  Like::where('likeTo', $userId)->pluck('likeFrom')->toArray();
        $combinedData->likesCount = count($combinedData->likeMe);

        return $combinedData;
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicDatasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicDatas $publicDatas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicDatas $publicDatas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicDatasRequest $request, PublicDatas $publicDatas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicDatas $publicDatas)
    {
        //
    }
}
