<?php

namespace Saifur\FileManager\app\Facades\Transfer;

use Illuminate\Support\Facades\Facade;

class SFMTransferFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmtransferhelper';
    }
}
