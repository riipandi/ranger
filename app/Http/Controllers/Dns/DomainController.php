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
        $data = Domain::paginate(20);
        $user = User::get();
        return view('dns.domain', ['data' => $data, 'user' => $user]);
    }

    public function add(Request $request)
    {
        $domain = Domain::where('name', $request->domain)->first();
        if ($domain === null) {
            Domain::create([
                'user_id' => $request->owner,
                'name'    => strtolower($request->domain),
                'type'    => strtoupper($request->type),
            ]);

            $admin_email = str_replace('@', '.', $domain->user->email);
            Record::create([
                'domain_id' => $domain->id,
                'name' => $request->domain,
                'type' => 'SOA',
                'content' => strtolower($request->ns1) . ' ' . $admin_email . ' 1 10380 3600 604800 3600',
            ]);

            alert()->success(__('Domain addedd!'), 'Success')->autoclose(1800);
            return redirect()->back();
        } else {
            alert()->warning(__('Domain already exists!'), 'Warning')->autoclose(1800);
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        $id = (int) implode('', Hashids::decode($request->id));
        $data = Domain::find($id);
        if ($data->delete()) {
            alert()->success(__('Record deleted!'), 'Success')->autoclose(1800);
            return redirect()->back();
        } else {
            alert()->warning(__('Record not exists!'), 'Warning')->autoclose(1800);
            return redirect()->back();
        }
    }

    public function editIndex(Request $request)
    {
        $id = (int) implode('', Hashids::decode($request->id));
        $data = Domain::find($id);
        return view('dns.domain.edit')->with('data', $data);
    }
}
