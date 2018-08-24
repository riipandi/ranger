<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\PostgreSql as PgDumper;

class DumpSql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dumpsql {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump SQL database';

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
            $this->doAction();
        } elseif ($this->confirm('Do you wish to continue?')) {
            $this->doAction();
        } else {
            $this->line('Task canceled!');
        }
    }

    protected function doAction()
    {
        $path = app()->storagePath();
        PgDumper::create()
            ->setDbName(env('DB_DATABASE'))
            ->setUserName(env('DB_USERNAME'))
            ->setPassword(env('DB_PASSWORD'))
            ->dumpToFile($path . '/dump-'. date('y-m-d').'.sql');
    }
}
