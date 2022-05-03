<?php

/****************************************************************
 * Health Project
 ****************************************************************/

namespace domain\Facades\Prescription;

use domain\Services\Prescription\PrescriptionService;
use Illuminate\Support\Facades\Facade;

class PrescriptionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PrescriptionService::class;
    }
}
