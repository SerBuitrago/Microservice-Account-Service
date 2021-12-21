<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\UserRegisterEvent::class => [
            \App\Listeners\UserRegister\RegisterInAccountServiceListener::class,
            \App\Listeners\UserRegister\RegisterInTutoringServiceListener::class,
            // \App\Listeners\UserRegister\RegisterInKnowledgeServiceListener::class,
        ]
    ];
}
