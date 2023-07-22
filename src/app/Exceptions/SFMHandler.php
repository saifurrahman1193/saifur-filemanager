<?php

namespace Saifur\FileManager\app\Exceptions;
use Throwable;
use Saifur\FileManager\app\Traits\ApiResponser;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Saifur\FileManager\app\Exceptions\DirectoryNotFoundException;

class SFMHandler extends ExceptionHandler
{
    use ApiResponser;

    public function register()
    {
    }


    public function render($request, Throwable $exception)
    {
        if (\config('app.debug'))  // in debug=true , the exception is rendered when debug is enabled
        {
            return parent::render($request, $exception);
        }

        $status=500; // Default status code set to 500

        if ($exception instanceof DirectoryNotFoundException)
        {
            $status=403;
        }

        // Check the response type in configuration settings and return the response
        if (\config('sfm.exception_response')=='api-response' && ($exception instanceof DirectoryNotFoundException))  // will return api response
        {
            return $this->set_response(null, $status, 'error', [$exception->getMessage()]);
        }
        else if (\config('sfm.exception_response')=='only-errors' && ($exception instanceof DirectoryNotFoundException)) // will return only errors as an array
        {
            return [$exception->getMessage()];
        }


        // return $this->handleError($this->prepareException($e));
        return parent::render($request, $exception);
    }




}
