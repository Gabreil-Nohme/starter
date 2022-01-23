<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use PhpParser\Node\Stmt\Foreach_;

class expiretion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run in 5 minute change status users';

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
    { //لتنفيذ الامر نتوجه ->kernel
        $users=User::where('expire',0)->get();//يأتي بكل المستخدمين التي قيمتهم  صفر
        foreach($users as $user){
            $user->update(['expire'=>1]);
        }
    }
}
