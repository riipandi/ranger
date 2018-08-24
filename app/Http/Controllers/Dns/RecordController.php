<?php

namespace App\Http\Controllers\Dns;

use App\Record;
use App\RecordType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id = (int) implode('', Hashids::decode($request->id));
        $data = Record::where('domain_id', $id)
            ->where('type', '!=', 'SOA')
            ->paginate(20);
        $type = RecordType::get();
        return view('dns.records', ['data' => $data, 'type' => $type]);
    }
}
