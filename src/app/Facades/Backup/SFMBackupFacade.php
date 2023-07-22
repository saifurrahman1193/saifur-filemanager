<?php

namespace Saifur\FileManager\app\Facades\Backup;

use Illuminate\Support\Facades\Facade;

class SFMBackupFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmbackuphelper';
    }
}
