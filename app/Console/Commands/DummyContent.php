<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DummyContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dummy {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate dummy content for testing';

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
            $this->ddoAction();
        } elseif ($this->confirm('Do you wish to continue?')) {
            $this->ddoAction();
        } else {
            $this->line('Task canceled!');
        }
    }

    private function ddoAction()
    {
        $this->line('Seeding dummy records into database');
        $this->callSilent('db:seed', ['--class' => 'UserDummySeeder']);
        $this->info(PHP_EOL.'Great, dummy content generated.');
        $this->info('Password for dummy users is: password');
    }
}
