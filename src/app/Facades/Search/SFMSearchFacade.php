<?php

namespace Saifur\FileManager\app\Facades\Search;

use Illuminate\Support\Facades\Facade;

class SFMSearchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sfmsearchhelper';
    }
}
