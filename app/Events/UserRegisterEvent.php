<?php

namespace App\Events;

use Illuminate\Http\Request;

class UserRegisterEvent extends Event
{

    private $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
