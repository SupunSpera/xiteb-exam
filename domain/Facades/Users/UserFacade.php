<?php

/****************************************************************
 * User Facade
 *
 ****************************************************************/

namespace domain\Facades\Users;

use domain\Services\Users\UserService;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserService::class;
    }
}
