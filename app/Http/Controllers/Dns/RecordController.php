<?php

namespace App\Http\Controllers\Dns;

use App\Record;
use App\RecordType;
use App\Domain;
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
        // $id = (int) implode('', Hashids::decode($request->id));
        $domain = Domain::where('name', $request->id)->first();
        $data = Record::where('domain_id', $domain->id)
            ->where('type', '!=', 'SOA')
            ->where('type', '!=', 'NS')
            ->paginate(20);
        $type = RecordType::get();
        return view('dns.records', ['data' => $data, 'type' => $type, 'domain' => $domain]);
    }

    public function add(Request $request)
    {
        $record = Record::where('type', $request->recordType)->where('content', $request->content)->first();
        if ($record === null) {
            $domain = Domain::find($request->domain_id)->first();
            if ($request->name == '@') {
                $name = $domain->name;
            } else {
                $name = $domain->name;
            }
            Record::create([
                    'domain_id' => $request->domain_id,
                    'name' => $name,
                    'type' => $request->recordType,
                    'content' => $request->content,
                    'ttl' => $request->ttl,
                    (isset($request->prio)) ?? 'prio' => $request->prio,
                ]);

            alert()->success(__('Record addedd!'), 'Success')->autoclose(1800);
            return redirect()->back();
        } else {
            alert()->warning(__('Record already exists!'), 'Warning')->autoclose(1800);
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $id = (int) implode('', Hashids::decode($request->id));
        $data = Record::find($id);
        if ($data->delete()) {
            alert()->success(__('Record deleted!'), 'Success')->autoclose(1800);
            return redirect()->back();
        } else {
            alert()->warning(__('Record not exists!'), 'Warning')->autoclose(1800);
            return redirect()->back();
        }
    }
}
