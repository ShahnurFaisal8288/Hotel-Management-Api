<?php

namespace App\Console\Commands;

use App\Mail\EndTimeEmail;
use App\Models\Investor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoEndTimeMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-end-time-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = Investor::whereMonth('start_to', date('m'))
                    ->whereDay('start_to', date('d'))
                    ->get();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new EndTimeEmail($user));
            }
        }

        return 0;
    }
}
