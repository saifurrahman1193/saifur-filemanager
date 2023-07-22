<?php

namespace Saifur\FileManager\app\Facades\Directory;

use Illuminate\Support\Facades\Facade;

class SFMDirectoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmdirectoryhelper';
    }
}
