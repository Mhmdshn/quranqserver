<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allusers = User::all();
        return Response()->json($allusers, 200);
    }

    public function auth(Request $request)
    {
        $userEmail = $request->input('email');
        $userPassword = $request->input('password');
        $user = User::where('email', $userEmail)->where('password', $userPassword)->first();
        
        return response()->json(['user' => $user], 201); // 201 Created status code

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Create a new user
        // $request->validate([
        //     'nid' => 'required|string',
        //     'email' => 'required|email',
        //     'name' => 'required|string',
        //     'gender' => 'required|in:m,f',
        //     'dob' => 'required|date',
        //     'address' => 'required|string',
        //     'island' => 'required|string',
        //     'country' => 'required|string',
        // ]);

        $dob = Carbon::parse($request->input('dob'));

        $user = User::create([
            'uuid'      => Str::uuid(),
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'nid'       => $request->input('nid'),
            'name'      => $request->input('name'),
            'gender'    => $request->input('gender'),
            'dob'       => $dob,
            'phone'     => $request->input('phone'),
            'currentisland'     => $request->input('currentisland'),
            'currentaddress'    => $request->input('currentaddress'),
            'registeredisland'  => $request->input('registeredisland'),
            'registeredaddress' => $request->input('registeredaddress'),
            'country'       => $request->input('country'),
            'useridcopy'    => $request->input('useridcopy')
        ]);
        return response()->json(['created_user' => $user], 201); // 201 Created status code

    }

    /**
     * Store a newly created resource in storage.
     */

     public function getUserByEmail($email, Request $request)
     {
         // Use the "first" method to retrieve a single user based on the email
         $specificUser = User::where('email', $email)->first();
     
         if (!$specificUser) {
             // Use abort(404) to return a 404 response when the user is not found
             return response()->json(['error' => 'User not found'], 404);
         }
     
         // Return the specific user in the response
         return response()->json($specificUser, 200);
     }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
