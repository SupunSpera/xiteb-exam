<?php

/****************************************************************
 * Health Project
 ****************************************************************/

namespace domain\Facades\Prescription;

use domain\Services\Prescription\PrescriptionImageService;
use Illuminate\Support\Facades\Facade;

class PrescriptionImageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PrescriptionImageService::class;
    }
}
