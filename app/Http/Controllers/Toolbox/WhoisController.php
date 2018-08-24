<?php

namespace App\Http\Controllers\Toolbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Iodev\Whois\Whois;
use Iodev\Whois\Exceptions\ConnectionException;
use Iodev\Whois\Exceptions\ServerMismatchException;
use Iodev\Whois\Exceptions\WhoisException;
use Carbon\Carbon;

use App\WhoisData;

class WhoisController extends Controller
{
    public function index(Request $request)
    {
        return view('toolbox.whois');
    }

    public function lookup(Request $request)
    {
        $domain = $request->domain;
        try {
            if ($WhoisData = WhoisData::where('domain', $domain)->first()) {
                $updated = $WhoisData->updated_at;
                if ($updated->diffInSeconds() >= 7200) {
                    $info = Whois::create()->lookupDomain($domain);
                    $WhoisData->domain = $domain;
                    $WhoisData->result = $info->getText();
                    $WhoisData->updated_at = Carbon::now();
                    $WhoisData->save();
                }
                return view('toolbox.whois')->with('infoFromCache', $WhoisData);
            } elseif ($info = Whois::create()->lookupDomain($domain)) {
                WhoisData::create(['domain' => $domain, 'result' => $info->getText()]);
                return view('toolbox.whois')->with('info', $info);
            } else {
                return redirect()->back()->with(['error' => 'Null if domain available!']);
            }
        } catch (ConnectionException $e) {
            return view('toolbox.whois')->with(['error' => 'Disconnect or connection timeout']);
        } catch (ServerMismatchException $e) {
            return view('toolbox.whois')->with([
                'error' => 'TLD for ' . $request->domain . ' not found in current server hosts!'
            ]);
        } catch (WhoisException $e) {
            return view('toolbox.whois')->with([
                'error' => 'Whois server responded with error: ' . $e->getMessage()
            ]);
        }
    }
}
