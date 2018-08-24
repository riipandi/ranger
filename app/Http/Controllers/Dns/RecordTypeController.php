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

    public function index()
    {
        $data = RecordType::paginate(20);
        return view('dns.recordtype')->with('data', $data);
        // return response()->json(RecordType::all()->toArray());
    }
}
