<?php

namespace App\Http\Controllers\Dns;

use App\DomainMetadata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DomainMetadataController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DomainMetadata  $domainMetadata
     * @return \Illuminate\Http\Response
     */
    public function show(DomainMetadata $domainMetadata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DomainMetadata  $domainMetadata
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainMetadata $domainMetadata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DomainMetadata  $domainMetadata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainMetadata $domainMetadata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DomainMetadata  $domainMetadata
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainMetadata $domainMetadata)
    {
        //
    }
}
