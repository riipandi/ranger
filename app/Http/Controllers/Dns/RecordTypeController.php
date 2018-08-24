<?php

namespace App\Http\Controllers\Dns;

use App\RecordType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RecordType::all()->toArray());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecordType  $recordType
     * @return \Illuminate\Http\Response
     */
    public function show(RecordType $recordType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecordType  $recordType
     * @return \Illuminate\Http\Response
     */
    public function edit(RecordType $recordType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecordType  $recordType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecordType $recordType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecordType  $recordType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecordType $recordType)
    {
        //
    }
}
