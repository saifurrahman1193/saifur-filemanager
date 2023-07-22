<?php

namespace Saifur\FileManager\app\Facades\Upload;

class SFMUploadHelper
{
    public function getProcessFile($parmas = [])
    {
        $file = $parmas[$file];
        $file_name = $parmas[$file_name];
        $file_location = $parmas[$file_location];

        $timestamp = getTimeStamp();
        $filename = getFileName($file_name) . '_' . $timestamp . '.' . $file->getClientOriginalExtension();
        $file_path = '/' . $file_location . $filename;
        $file->move($file_location, $filename);

        $message = 'File uploaded successfully';
        return ['file_path' => $file_path, 'file_name' => $filename, 'message' => $message];
    }

}
