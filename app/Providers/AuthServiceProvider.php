<?php

namespace App\Providers;

use App\Bunch;
use App\Campaign;
use App\Policies\BunchPolicy;
use App\Policies\CampaignPolicy;
use App\Policies\SubscriberPolicy;
use App\Policies\TemplatePolicy;
use App\Subscriber;
use App\Template;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Template::class => TemplatePolicy::class,
        Bunch::class => BunchPolicy::class,
        Subscriber::class => SubscriberPolicy::class,
        Campaign::class => CampaignPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
