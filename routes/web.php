<?php

Route::get('/', 'WelcomeController@index');
Route::get('ip', 'Toolbox\IpController@index')->name('toolbox.ip');

// Whois route
Route::get('whois', 'Toolbox\WhoisController@index')->name('whois.index');
Route::get('whois/{domain}', 'Toolbox\WhoisController@lookup')->name('whois.lookup');
Route::post('whois', function () {
    return Redirect::action('Toolbox\WhoisController@lookup', [
        'domain' => Request::get('domain')
    ]);
});

// DNS Check route
Route::get('dns', 'Toolbox\DnsCheckController@index')->name('dnscheck.index');
Route::get('dns/{domain}', 'Toolbox\DnsCheckController@lookup')->name('dnscheck.lookup');
Route::post('dns', function () {
    return Redirect::action('Toolbox\DnsCheckController@lookup', [
        'domain' => Request::get('domain')
    ]);
});

/**
 * Authentication routes
 */
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('password', 'User\PasswordController@index')->name('user.password');
Route::post('password', 'User\PasswordController@save')->name('user.password');
Route::get('account', 'User\SettingController@index')->name('user.setting');
Route::post('account', 'User\SettingController@save')->name('user.setting');

/**
 * DNS Admin routes
 */
Route::get('zones', 'Dns\DomainController@index')->name('dns.zones');
Route::get('records', 'Dns\RecordController@index')->name('dns.records');
Route::get('recordtype', 'Dns\RecordTypeController@index')->name('dns.recordtype');
