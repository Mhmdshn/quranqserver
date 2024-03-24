<?php

namespace App\Http\Controllers;

use App\Models\Taken;
use App\Http\Requests\StoreTakenRequest;
use App\Http\Requests\UpdateTakenRequest;

class TakenController extends Controller
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
    public function store(StoreTakenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Taken $taken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taken $taken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTakenRequest $request, Taken $taken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Taken $taken)
    {
        //
    }
}
