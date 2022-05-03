<?php

namespace domain\Facades\Notifications;

use domain\Services\Notifications\NotificationService;
use Illuminate\Support\Facades\Facade;

/**
 * Class NotificationFacade
 * @package domain\Facades
 */
class NotificationFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return NotificationService::class;
    }
}
