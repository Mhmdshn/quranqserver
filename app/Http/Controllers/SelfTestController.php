<?php

namespace App\Http\Controllers;

use App\Models\SelfTest;
use App\Http\Requests\StoreSelfTestRequest;
use App\Http\Requests\UpdateSelfTestRequest;

class SelfTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreSelfTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SelfTest $selfTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SelfTest $selfTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSelfTestRequest $request, SelfTest $selfTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SelfTest $selfTest)
    {
        //
    }
}
