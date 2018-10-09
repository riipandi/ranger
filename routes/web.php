<?php

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/manifest.json', 'WelcomeController@pwaManifest')->name('pwa.manifest');

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


// Authentication
Auth::routes(['verify' => true]);
Route::get('auth', function () {
    return redirect('login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Social Login
Route::get('auth/{provider}', 'Auth\UserSocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\UserSocialController@handleProviderCallback');
Route::get('disconnect/{provider}', 'Auth\UserSocialController@disconnect');

// User controllers
Route::get('dashboard', 'User\DashboardController@index')->name('dashboard')->middleware('verified');
Route::get('settings/general', 'OptionsController@index')->name('setting.general')->middleware('verified');

Route::get('users', 'User\UsersController@index')->name('user.list');
Route::get('settings/profile', 'User\ProfileController@index')->name('user.profile');
Route::get('settings/account', 'User\AccountController@index')->name('user.account');
Route::get('account/destroy', 'User\AccountController@destroy')->name('user.destroy');
Route::post('settings/account', 'User\AccountController@updateSetting')->name('setting.account');
Route::post('settings/password', 'User\AccountController@changePassword')->name('setting.password');

/**
 * DNS Admin routes
 */
Route::get('domains', 'Dns\DomainController@index')->name('dns.zones.list');
Route::post('domains', 'Dns\DomainController@add')->name('dns.zones.add');
Route::get('domains/{id}/edit', 'Dns\DomainController@edit')->name('dns.zones.edit');
Route::get('domains/{id}/delete', 'Dns\DomainController@delete')->name('dns.zones.delete');

Route::get('domains/{id}/records', 'Dns\RecordController@index')->name('dns.records');
Route::get('record/{id}/edit', 'Dns\RecordController@edit')->name('dns.record.edit');
Route::get('record/{id}/delete', 'Dns\RecordController@delete')->name('dns.record.delete');
Route::post('record', 'Dns\RecordController@add')->name('dns.record.add');

Route::get('recordtype', 'Dns\RecordTypeController@index')->name('dns.recordtype');
