<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class FreshInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fresh {--force} {--password=}';

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
            $this->line(PHP_EOL);
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
        $this->callSilent('migrate:fresh');

        $this->line('- Seeding required records');
        $this->callSilent('db:seed', ['--class' => 'UsersGroupsSeeder']);

        $this->line('- Creating super admin user');
        $this->callSilent('app:makeadmin');

        $pass = ($this->option('password')) ?? str_random(13);
        $user = User::where('id', 1)->first();

        $this->callSilent('app:setpassword', [
            '--email' => $user->email,
            '--password' => $pass,
        ]);

        $this->info(PHP_EOL.'Application installed successfully.');
        $this->line('Username    : ' . $user->username);
        $this->line('Password    : ' . $pass);
        $this->line('Admin Email : ' . $user->email);

        // $this->call('passport:install', ['--force' => 'default']);
    }
}
