<?php

namespace App\Http\Controllers\Dns;

use App\User;
use App\Domain;
use App\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class DomainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->is_admin == true) {
            $data = Domain::paginate(20)->linksOnEachSide(5);
        } else {
            $data = Domain::where('user_id', auth()->user()->id)->paginate(20);
        }
        $user = User::get();
        return view('dns.zones', ['data' => $data, 'user' => $user]);
    }

    public function add(Request $request)
    {
        $domain = Domain::where('name', $request->domain)->first();
        if ($domain === null) {
            Domain::create([
                'user_id' => auth()->user()->id,
                'name'    => strtolower($request->domain),
                'type'    => 'NATIVE',
            ]);

            $domain = Domain::where('name', $request->domain)->first();
            $admin_email = str_replace('@', '.', auth()->user()->email);
            $soa_record  = option('default_ns1') . ' ' . $admin_email . ' 1 10380 3600 604800 3600';

            Record::create([
                'domain_id' => $domain->id,
                'name' => $request->domain,
                'type' => 'SOA',
                'content' => $soa_record,
            ]);
            return redirect()->back()->with(['success' => __('Domain addedd!')]);
        } else {
            return redirect()->back()->with(['warning' => __('Domain already exists!')]);
        }
    }

    public function delete(Request $request)
    {
        $data = Domain::find($request->id);
        if ($data->delete()) {
            return redirect()->back()->with(['warning' => __('Domain has been deleted!')]);
        } else {
            return redirect()->back()->with(['warning' => __('Failed to delete domain!')]);
        }
    }

    public function editIndex(Request $request)
    {
        $id = (int) implode('', Hashids::decode($request->id));
        $data = Domain::find($id);
        return view('dns.domain.edit')->with('data', $data);
    }
}
