<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature ='notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' send notify email for users every day';

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
    {   //لتنفيذ الامر نتوجه ->kernel
          //جلب ايميلات المستخدمين
        //$users=User::select('email')->get();
        //foreachتحويل الايميلات لمصفوفات للتعامل معها بال
        $emails=User::pluck('email')->ToArray();
        $data=['title'=>'programming','body'=>'php'];
        foreach($emails as $email){
            Mail::to($email)->send(new NotifyEmail($data));
        }
    }
}
