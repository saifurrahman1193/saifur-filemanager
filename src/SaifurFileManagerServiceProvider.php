<?php

namespace Saifur\FileManager;

use Illuminate\Support\ServiceProvider;
use Saifur\FileManager\app\Facades\Helpers\SFMCommonHelper;

class SaifurFileManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Facades Registration
        $this->app->bind('sfmcommonhelper', function () {  return new SFMCommonHelper();   });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'logviewer');
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/saifur/logviewer'),
        ], 'public');

        // middlewares

        require_once __DIR__.'/app/Libraries/Helpers.php';
    }


}
