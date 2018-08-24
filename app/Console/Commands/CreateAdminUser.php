<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\UserMetadata;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:makeadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default admin user';

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
        $user = User::where('id', 1)->first();
        $uname = 'admin';
        $email = $uname . '@' . request()->getHost();
        $paswd = str_random(13);

        if (!$user) {
            User::create([
                'realname'  => 'Super Admin',
                'username'  => $uname,
                'email'     => $email,
                'password'  => Hash::make($paswd),
                'group_id'  => 1,
                'confirmed' => true,
                'disabled'  => false,
                'verified'  => true,
                'remember_token' => str_random(10),
            ]);
            $this->info(PHP_EOL . "User $uname created with email $email and password $paswd");
        } else {
            $this->error(PHP_EOL . "Default admin user already exists!");
        }

        $usermeta = UserMetadata::where('user_id', 1)->first();
        $userdata = [
            'gender'       => 'M',
            'birth_place'  => 'Sukabumi',
            'birth_date'   => '1945-08-17',
            'phone'        => '082136263876',
            'home_address' => 'Jl. R.H. Didi Sukardi Gg.PGRI'
        ];

        if (!$usermeta) {
            foreach ($userdata as $key => $val) {
                UserMetadata::create([
                    'user_id' => 1, 'key' => $key, 'value' => $val
                ]);
            }
        }
    }
}
