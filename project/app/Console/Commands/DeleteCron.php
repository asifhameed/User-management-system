<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete48hours:cron';

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
        $result = User::Where('status', 0)
                        ->where('blocked_at', '<=', Carbon::now()->subDays(2)->toDateTimeString())
                        ->get();
        if(count($result) > 0)
        {
            foreach($result as $key=>$rows)
            {
                User::where('id', $rows->id)->delete();
                \Log::info("48 hours old Records found.");
            }                        
        }
        else
        {
            \Log::info("48 hours old Records not found.");
        }
    }
}
