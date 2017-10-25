<?php

namespace App\Jobs;

use App\Campaign;
use App\Mail\MailClass;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $campaign;

    /**
     * Create a new job instance.
     *
     * @param $campaign
     */
    public function __construct($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        $when = Carbon\Carbon::now()->addMinutes(10);
        foreach($this->campaign->bunch->subscribers->slice(25) as $key => $subscriber){
            Mail::to($subscriber->email)
                ->later(25, new SendEmail($this->campaign))
                ->send(new MailClass($this->campaign->name, $subscriber->name, $subscriber->email, $this->campaign->template->content));
        }
    }
}
