<?php

namespace App\Listeners\UserRegister;

use App\Events\UserRegisterEvent;
use App\Services\KnowledgeService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterInKnowledgeServiceListener
{
    private KnowledgeService $service;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->service = new KnowledgeService();
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegisterEvent  $event
     * @return void
     */
    public function handle(UserRegisterEvent $event)
    {
        $data = $event->getData();

        $newData = [
            'id' => $data['code'],
            'name' => $data['name'] . $data['last_name'],
            'email' => $data['email'],
        ];
        return $this->service->storeUser($newData);
    }
}
