<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Generate manifet.json for PWA.
     *
     * @return \Illuminate\Http\Response
     */
    public function pwaManifest()
    {
        return response()->json([
            'name'             => config('app.name'),
            'short_name'       => str_before(config('app.name'), ' '),
            'lang'             => config('app.locale'),
            'theme_color'      => '#4188c9',
            'background_color' => '#fff',
            'display'          => 'standalone',
            'scope'            => '/',
            'start_url'        => config('app.url'),
            'icons'            => [
                [
                    'src'   => asset('images/icon_48_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '48x48',
                ],
                [
                    'src'   => asset('images/icon_72_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '72x72',
                ],
                [
                    'src'   => asset('images/icon_96_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '96x96',
                ],
                [
                    'src'   => asset('images/icon_128_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '128x128',
                ],
                [
                    'src'   => asset('images/icon_144_48_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '144x144',
                ],
                [
                    'src'   => asset('images/icon_168_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '168x168',
                ],
                [
                    'src'   => asset('images/icon_192_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '192x192',
                ],
                [
                    'src'   => asset('images/icon_256_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '256x256',
                ],
                [
                    'src'   => asset('images/icon_384_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '384x384',
                ],
                [
                    'src'   => asset('images/icon_512_dpi.png'),
                    'type'  => 'image/png',
                    'sizes' => '512x512',
                ],
            ],
        ]);
    }
}
