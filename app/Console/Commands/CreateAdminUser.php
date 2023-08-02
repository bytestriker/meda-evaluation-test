<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meda:make.admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Admin';

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
     * @return int
     */
    public function handle()
    {
        
        $administrator = new User();
        $administrator->name = 'admin';
        $administrator->email = 'admin@meda.com.mx';
        $administrator->password = Hash::make('test');
        $administrator->type = 'admin';
        $administrator->save();

        print("Medá Administration User was successfully created" . PHP_EOL);
        print("User Name: 'admin'" . PHP_EOL);
        print("User Email: 'admin@meda.com.mx'" . PHP_EOL);
        print("Password: 'test'" . PHP_EOL);
        return 0;
    }
}
