<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:setpassword {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Override user password';

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
        $email = $this->option('email');
        $pass = $this->option('password');

        if ($email && $pass) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->password = Hash::make($pass);
                $user->save();
                $this->info(PHP_EOL.'Password changed!');
            } else {
                $this->error(PHP_EOL."User with email $email not found!");
            }
        } else {
            $this->error(PHP_EOL.'Please identify user by email and specify new password!');
        }
    }
}
