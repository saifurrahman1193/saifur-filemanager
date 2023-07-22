<?php

use Illuminate\Support\Facades\Route;
use Saifur\FileManager\app\Http\Controllers\UploadController;
use Saifur\FileManager\app\Http\Controllers\DirectoryController;


Route::group(['prefix' => 'saifur/file-manager'],function (){
    Route::group(['prefix' => 'upload'],function (){
        Route::post('file-upload', [UploadController::class, 'fileUpload']);
    });
    Route::group(['prefix' => 'download'],function (){  });
    Route::group(['prefix' => 'replace'],function (){  });
    Route::group(['prefix' => 'convert'],function (){  });
    Route::group(['prefix' => 'resize'],function (){  });
    Route::group(['prefix' => 'search'],function (){  });
    Route::group(['prefix' => 'transfer'],function (){  });
    Route::group(['prefix' => 'delete'],function (){  });
    Route::group(['prefix' => 'backup'],function (){  });
    Route::group(['prefix' => 'directory'],function (){
        Route::post('get-files', [DirectoryController::class, 'getFiles']);
        Route::post('get-files2', [DirectoryController::class, 'getFiles2']);
        Route::post('get-files-with-details', [DirectoryController::class, 'getFilesWithDetails']);
        Route::post('create-directory', [DirectoryController::class, 'createDirectory']);
        Route::post('delete-directory', [DirectoryController::class, 'deleteDirectory']);
        Route::post('rename-directory', [DirectoryController::class, 'renameDirectory']);
        Route::post('copy-directory', [DirectoryController::class, 'copyDirectory']);
        Route::post('move-directory', [DirectoryController::class, 'moveDirectory']);
    });
});
