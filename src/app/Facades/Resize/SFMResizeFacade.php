<?php

namespace Saifur\FileManager\app\Facades\Resize;

use Illuminate\Support\Facades\Facade;

class SFMResizeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmresizehelper';
    }
}
