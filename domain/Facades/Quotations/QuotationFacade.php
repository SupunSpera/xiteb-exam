<?php

namespace domain\Facades\Quotations;

use domain\Services\Quotations\QuotationService;
use Illuminate\Support\Facades\Facade;

/**
 * @package domain\Facades
 */
class QuotationFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return QuotationService::class;
    }
}
