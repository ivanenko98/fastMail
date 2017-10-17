<?php

namespace App\Providers;

use App\Bunch;
use App\Campaign;
use App\Observers\BunchObserver;
use App\Observers\CampaignObserver;
use App\Observers\SubscriberObserver;
use App\Observers\TemplateObserver;
use App\Subscriber;
use App\Template;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Template::observe(TemplateObserver::class);
        Bunch::observe(BunchObserver::class);
        Subscriber::observe(SubscriberObserver::class);
        Campaign::observe(CampaignObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
