<?php

namespace Saifur\FileManager\app\Facades\Helpers;

use Illuminate\Support\Facades\Facade;

class SFMCommonFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmcommonhelper';
    }
}
