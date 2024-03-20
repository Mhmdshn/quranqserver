<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Save;
use App\Models\PublicDatas;
use App\Http\Requests\StorePublicDatasRequest;
use App\Http\Requests\UpdatePublicDatasRequest;
use Carbon\Carbon;

class MyProfileController extends Controller
{
    public function getById($id, Request $request)
    {
        // $userId = $request->query('id');
        $specificPost = $this->getUserAllDataById($id);
        if (!$specificPost) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        return response()->json($specificPost, 200);
    }


    private function getUserAllDataById($userId)
    {
        $combinedData = User::join('posts', 'users.id', '=', 'posts.userId')
        ->leftJoin('likes', 'users.id', '=', 'likes.likeTo')
        ->where('users.id', $userId)
            ->select(
                'users.id as userId',
                'users.*',
                'posts.*'
            )->first();

        if (!$combinedData) {
                // Handle the case where the user is not found
            return null;
        }


        $dob = Carbon::parse($combinedData->dob);
        $combinedData->age = $dob->diffInYears(Carbon::now());
        unset($combinedData->id);
        unset($combinedData->password);
        $combinedData->saved =  Save::where('saveFrom', $userId)->pluck('saveTo')->toArray();
        $combinedData->iLike =  Like::where('likeFrom', $userId)->pluck('likeTo')->toArray();
        $combinedData->likeMe = Like::where('likeTo', $userId)->pluck('likeFrom')->toArray();
        $combinedData->likesMeCount = count($combinedData->likeMe);

        return $combinedData;
    }
}
