<?php

namespace Saifur\FileManager\app\Facades\Convert;

use Illuminate\Support\Facades\Facade;

class SFMConvertFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmconverthelper';
    }
}
