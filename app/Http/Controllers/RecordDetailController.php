<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecordDetail;
use Illuminate\Http\Request;

class RecordDetailController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RecordDetail::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecordDetail  $recordDetail
     * @return \Illuminate\Http\Response
     */
    public function show(RecordDetail $recordDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecordDetail  $recordDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(RecordDetail $recordDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecordDetail  $recordDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecordDetail $recordDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecordDetail  $recordDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecordDetail $detail_record)
    {
        $detail_record->delete();
        return redirect()->back();
    }
}
