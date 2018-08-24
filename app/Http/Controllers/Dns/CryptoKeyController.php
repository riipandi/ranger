<?php

namespace App\Http\Controllers\Dns;

use App\CryptoKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoKeyController extends Controller
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
     * @param  \App\CryptoKey  $cryptoKey
     * @return \Illuminate\Http\Response
     */
    public function show(CryptoKey $cryptoKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CryptoKey  $cryptoKey
     * @return \Illuminate\Http\Response
     */
    public function edit(CryptoKey $cryptoKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CryptoKey  $cryptoKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CryptoKey $cryptoKey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CryptoKey  $cryptoKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(CryptoKey $cryptoKey)
    {
        //
    }
}
