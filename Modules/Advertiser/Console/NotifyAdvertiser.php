<?php

namespace Modules\Advertiser\Console;

use Illuminate\Console\Command;
use Modules\Advertiser\Emails\NotifyMail;
use Modules\Advertiser\Entities\Advertiser;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class NotifyAdvertiser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'nofity:advertiser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedule a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder';

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
        $advertisers = Advertiser::whereHas('ads', function ($query){
            $query->whereDate('start_date', '=', \Carbon\Carbon::tomorrow());
        })->get();

        // TODO Queue
        $details = [
            'title' => 'Mail from Ad.com ',
            'body' => 'This is for testing email using smtp'
        ];
        foreach ($advertisers as $advertiser){
            \Mail::to($advertiser->email)->send(new NotifyMail($details));
        }
        info('Done Successfully');
    }
}
