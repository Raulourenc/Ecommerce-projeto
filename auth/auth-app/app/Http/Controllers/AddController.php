<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Http\Requests\StoreAddRequest;
use App\Http\Requests\UpdateAddRequest;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAddRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function show(Add $add)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function edit(Add $add)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddRequest  $request
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddRequest $request, Add $add)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Add  $add
     * @return \Illuminate\Http\Response
     */
    public function destroy(Add $add)
    {
        //
    }
}
