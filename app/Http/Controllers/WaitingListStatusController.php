<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWaitingListStatusRequest;
use App\Http\Requests\UpdateWaitingListStatusRequest;
use App\Models\WaitingListStatus;

class WaitingListStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreWaitingListStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWaitingListStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WaitingListStatus  $waitingListStatus
     * @return \Illuminate\Http\Response
     */
    public function show(WaitingListStatus $waitingListStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WaitingListStatus  $waitingListStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(WaitingListStatus $waitingListStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWaitingListStatusRequest  $request
     * @param  \App\Models\WaitingListStatus  $waitingListStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWaitingListStatusRequest $request, WaitingListStatus $waitingListStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WaitingListStatus  $waitingListStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaitingListStatus $waitingListStatus)
    {
        //
    }
}
