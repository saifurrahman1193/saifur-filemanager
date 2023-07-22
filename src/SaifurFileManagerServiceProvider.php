<?php

namespace Saifur\FileManager;

use Illuminate\Support\ServiceProvider;
use Saifur\FileManager\app\Facades\Backup\SFMBackupHelper;
use Saifur\FileManager\app\Facades\Helpers\SFMCommonHelper;
use Saifur\FileManager\app\Facades\Helpers\SFMUploadHelper;
use Saifur\FileManager\app\Facades\Convert\SFMConvertHelper;
use Saifur\FileManager\app\Facades\Helpers\SFMDownloadHelper;

class SaifurFileManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Facades Registration
        $this->app->bind('sfmbackuphelper', function () {  return new SFMBackupHelper();   });
        $this->app->bind('sfmconverthelper', function () {  return new SFMConvertHelper();   });
        $this->app->bind('sfmdirectorehelper', function () {  return new SFMDirectoreHelper();   });
        $this->app->bind('sfmcdownloadhelper', function () {  return new SFMDownloadHelper();   });
        $this->app->bind('sfmcommonhelper', function () {  return new SFMCommonHelper();   });
        $this->app->bind('sfmresizehelper', function () {  return new SFMResizeHelper();   });
        $this->app->bind('sfmsearchhelper', function () {  return new SFMSearchHelper();   });
        $this->app->bind('sfmtransferhelper', function () {  return new SFMTransferHelper();   });
        $this->app->bind('sfmuploadhelper', function () {  return new SFMUploadHelper();   });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/config/sfm.php' => config_path('sfm.php') ], 'config');

        // Routes loading
        if (config('sfm.use_package_routes'))
        {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }
        $this->loadViewsFrom(__DIR__.'/resources/views', 'filemanager');
        $this->publishes([__DIR__.'/public' => public_path('vendor/saifur/filemanager'), ], 'public');

        require_once __DIR__.'/app/Libraries/Helpers.php';
    }

}

