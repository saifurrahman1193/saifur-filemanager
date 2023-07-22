<?php

namespace Saifur\FileManager\app\Facades\Helpers;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Saifur\FileManager\app\Exceptions\DirectoryNotFoundException;

class SFMCommonHelper {


    public function writeToLog($logMessage, $logType = 'error')
    {
        try {
            $allLogTypes = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug', 'success'];

            $logType = strtolower($logType);

            if (in_array($logType, $allLogTypes)) {
                \Log::$logType($logMessage);
            }
        } catch (\Exception $exception) {
            //
        }
    }

    public function getRootPath($params=[])
    {
        if (\config('sfm.disk')=='public')
        {
            return public_path();
        }
        else
        {
            return storage_path();
        }
    }


    public function prependString($params=[])
    {
        $mainString = $params['mainString'] ?? ''; //  string where to prepend
        $mainString = preg_replace('/\/+/', '/', $mainString);  // replace * occurrences of consecutive ("/") with a 1 ("/")

        $prependString = $params['prependString'] ?? ''; // prepend string which will be prepended

        if (strpos($mainString, $prependString) !== 0)
        {
            $mainString = $prependString . $mainString;
        }

        return $mainString;
    }

    public function pathCleaning($params=[])  // clean the path from invalid characters
    {
        $path = $params['path'] ?? '';
        $path = preg_replace('/\/+/', '/', $path);  // replace * occurrences of consecutive ("/") with a 1 ("/")

        if (strpos($path, '/') !== 0)  // prepending "/"
        {
            $path = '/' . $path;
        }

        return $path;
    }

    public function sfm_custom_exceptions($exception)
    {
        $status=500;
        if ($exception instanceof DirectoryNotFoundException)
        {
            $status=403;
            $exception = new HttpException($status, $exception->getMessage());
            $message = $exception->getMessage();
        }
        return [$status, $exception, $message ?? null];
    }

    public function convertDataSize($sizeInBytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $unitIndex = 0;

        while ($sizeInBytes >= 1024 && $unitIndex < count($units) - 1) {
            $sizeInBytes /= 1024;
            $unitIndex++;
        }

        return round($sizeInBytes, 2) . ' ' . $units[$unitIndex];
    }
}
