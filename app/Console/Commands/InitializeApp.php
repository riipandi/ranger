<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitializeApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize application configuration';

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
            $this->initalizeApp();
        } elseif ($this->confirm('Do you wish to continue?')) {
            $this->initalizeApp();
        } else {
            $this->line('Task canceled!');
        }
    }

    private function initalizeApp()
    {
        $this->line('Creating environment file..');
        file_exists('.env') || copy('.env.example', '.env');

        // $appenv = $this->choice('Application environment?', ['local', 'testing', 'production']);
        // $appurl = $this->ask('Application URL?');
        // $dbtype = $this->choice('Database type?', ['mysql', 'pgsql'], 1);
        // $dbhost = $this->anticipate('Database host?', ['localhost', '127.0.0.1']);
        // $dbname = $this->ask('Database name?');
        // $dbuser = $this->ask('Database username?');
        // $dbpass = $this->secret('Database password?');

        // $this->setEnvironmentValue('APP_ENV', $appenv);
        // $this->setEnvironmentValue('APP_URL', $appurl);
        // $this->setEnvironmentValue('DB_CONNECTION', $dbtype);
        // $this->setEnvironmentValue('DB_HOST', $dbhost);
        // $this->setEnvironmentValue('DB_DATABASE', $dbname);
        // $this->setEnvironmentValue('DB_USERNAME', $dbuser);
        // $this->setEnvironmentValue('DB_PASSWORD', $dbpass);

        $this->callSilent('key:generate');
        $this->line('Application was configured!');
    }

    private function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($envKey);

        $str = str_replace("{$oldValue}", "{$envValue}", $str);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}
