<?php

namespace Saifur\FileManager\app\Facades\Upload;

use Illuminate\Support\Facades\Facade;

class SFMUploadFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmuploadhelper';
    }
}
