<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class FreshInstallation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fresh {--force} {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Begin fresh installation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('force')) {
            $this->doInstallation();
        } elseif ($this->confirm('Do you wish to continue?')) {
            $this->doInstallation();
        } else {
            $this->line('Task canceled!');
        }
    }

    protected function doInstallation()
    {
        $this->line('- Removing old cache and configuration');
        $this->callSilent('config:clear');
        $this->callSilent('cache:clear');
        $this->callSilent('route:clear');
        $this->callSilent('clear-compiled');

        $this->line('- Migrating database schemas');
        $this->callSilent('migrate:fresh', ['--seed']);

        $this->line('- Initializing system options');
        $this->createOptions();

        $this->line('- Creating super admin user');

        $mail = ($this->option('email')) ?? 'admin@'.request()->getHost();
        $pass = ($this->option('password')) ?? str_random(13);
        $this->createAdmin($mail, $pass);

        $user = User::where('id', 1)->first();
        $this->info(PHP_EOL.'Application installed successfully.');
        $this->line('Username    : '.'admin');
        $this->line('Password    : '.$pass);
        $this->line('Admin Email : '.$mail);

        // $this->call('passport:install', ['--force' => 'default']);
    }

    protected function createAdmin($email, $password)
    {
        if (!$user = User::where('id', 1)->first()) {
            User::create([
                'name'              => 'Super Admin',
                'username'          => 'admin',
                'email'             => $email,
                'password'          => Hash::make($password),
                'disabled'          => false,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'remember_token'    => str_random(60),
            ]);
            $this->info(PHP_EOL."User admin created with email $email and password $password");
        } else {
            $this->error(PHP_EOL.'Default admin user already exists!');
        }

        $book = User::find(1);
        $book->addMeta('gender', 'Male');
        $book->addMeta('birth_place', 'Asgard');
        $book->addMeta('birth_date', '1945-08-17');
        $book->addMeta('phone_mobile', '+62.80000000000');
        $book->addMeta('home_address', 'Knowhere, somewhere at universe');
    }

    protected function createOptions()
    {
        return option([
            'enable_social_auth'   => 'true',
            'enable_auth_google'   => 'true',
            'enable_auth_facebook' => 'true',
            'enable_auth_twitter'  => 'true',
            'enable_auth_github'   => 'true',
            'enable_user_2factor'  => 'true',
            'oauth_facebook_client'  => 'null',
            'oauth_facebook_secret'  => 'null',
            'oauth_twitter_client'  => 'null',
            'oauth_twitter_secret'  => 'null',
            'oauth_google_client'  => 'null',
            'oauth_google_secret'  => 'null',
            'oauth_github_client'  => 'null',
            'oauth_github_secret'  => 'null',
            'mail_driver'          => 'smtp',
            'mail_host'            => 'smtp.mailtrap.io',
            'mail_port'            => '2525',
            'mail_username'        => 'null',
            'mail_password'        => 'null',
            'mail_encryption'      => 'tls',
        ]);
    }
}
