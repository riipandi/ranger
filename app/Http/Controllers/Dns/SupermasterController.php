<?php

namespace App\Http\Controllers\Dns;

use App\Supermaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupermasterController extends Controller
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
     * @param  \App\Supermaster  $supermaster
     * @return \Illuminate\Http\Response
     */
    public function show(Supermaster $supermaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supermaster  $supermaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Supermaster $supermaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supermaster  $supermaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supermaster $supermaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supermaster  $supermaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supermaster $supermaster)
    {
        //
    }
}
