<?php

namespace Msaaq\NelcLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Msaaq\NelcLaravel\Nelc
 */
class Nelc extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Msaaq\NelcLaravel\Nelc::class;
    }
}
