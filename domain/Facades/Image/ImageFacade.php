<?php

namespace domain\Facades\Image;

use domain\Services\Image\ImageService;
use Illuminate\Support\Facades\Facade;

/**
 * Class FormFacade
 * @package domain\Facades
 */
class ImageFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ImageService::class;
    }
}
