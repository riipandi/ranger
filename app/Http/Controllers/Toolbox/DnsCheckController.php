<?php

namespace App\Http\Controllers\Toolbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Dns\Dns;

class DnsCheckController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('toolbox.dns');
    }

    public function lookup(Request $request)
    {
        $domain = $request->domain;
        $dns = new Dns($domain);
        // $dns->getRecords(); // returns all records
        // $dns->getRecords(['A', 'MX']); // returns both A and MX records

        try {
            $dnsRecords = $dns->getRecords();
        } catch (Exception $e) {
            $dnsRecords = '';
        }
        if ($dnsRecords === '') {
            return redirect()->back()->with(['danger' => 'Could not fetch DNS Record for ' . $domain]);
        }
        // return response()->view('home.index', ['output' => htmlentities($dnsRecords), 'domain' => $domain ]);
    }
}
