<?php

namespace App\Http\Controllers;

use App\Models\DataModel;
use App\Http\Requests\StoreDataModelRequest;
use App\Http\Requests\UpdateDataModelRequest;

class DataModelController extends Controller
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
     * @param  \App\Http\Requests\StoreDataModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function show(DataModel $dataModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DataModel $dataModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataModelRequest  $request
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataModelRequest $request, DataModel $dataModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataModel  $dataModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataModel $dataModel)
    {
        //
    }
}
