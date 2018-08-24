<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpseclib\Crypt\RSA;

class KeysCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'key:rsa
                                      {--force : Overwrite keys they already exist}
                                      {--length=4096 : The length of the private key}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the RSA encryption keys';

    /**
     * Execute the console command.
     *
     * @param  \phpseclib\Crypt\RSA  $rsa
     * @return mixed
     */
    public function handle(RSA $rsa)
    {
        $path = app()->storagePath();
        $keys = $rsa->createKey($this->input ? (int) $this->option('length') : 4096);

        list($publicKey, $privateKey) = [
            $path . '/AppPublic.key',
            $path . '/AppPrivate.key',
        ];

        if ((file_exists($publicKey) || file_exists($privateKey)) && ! $this->option('force')) {
            return $this->error(PHP_EOL.'Encryption keys already exist. Use the --force option to overwrite them.');
        }

        file_put_contents($publicKey, array_get($keys, 'publickey'));
        file_put_contents($privateKey, array_get($keys, 'privatekey'));

        $this->info(PHP_EOL.'Encryption keys generated successfully.');
    }
}
