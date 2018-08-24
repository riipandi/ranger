<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetAdminPass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:resetadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset super admin password';

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
        $user = User::find(1);
        $pass = str_random(13);

        if ($user) {
            $user->password = Hash::make($pass);
            $user->save();
            $this->info(PHP_EOL . "Super user password changed to:" . $pass);
        } else {
            $this->error(PHP_EOL . "User admin doesn't exists!");
        }
    }
}
