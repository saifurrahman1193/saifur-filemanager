<?php

namespace Saifur\FileManager\app\Facades\Download;

use Illuminate\Support\Facades\Facade;

class SFMDownloadFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmdownloadhelper';
    }
}
