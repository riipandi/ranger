<?php

namespace App\Http\Controllers\Toolbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IpController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $output = 'Your ip address is ' . request()->ip() . '.';
        return view('toolbox.myip')->with('output', $output);
    }
}
