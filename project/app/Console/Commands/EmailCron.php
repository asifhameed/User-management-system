<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class EmailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email24hours:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // \Log::info("Email sent every 24 hours");
        $result = User::Where('status', 0)
                        ->where('blocked_at', '<=', Carbon::now()->subDays(1)->toDateTimeString())
                        ->get();
        if(count($result) > 0)
        {
            foreach($result as $key=>$rows)
            {
                $email_address = $rows->email;
                $mailArray = [
                    'name' => ucfirst($rows->name)
                ];
                Mail::send('emails.alertemail', $mailArray, function($message) use ($email_address)  {
                    $message->from('youremail@gmail.com');
                    $message->to($email_address);
                    $message->subject('Reminder: Blocked records deleted | Task');
                });
                \Log::info("Email sent.");
            }            
        }
        else
        {
            \Log::info("24 hours email Records not found.");
        }
    }
}
