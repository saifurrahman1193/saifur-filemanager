<?php
namespace Saifur\FileManager\app\Modules\Directory;

use Illuminate\Support\Facades\File;
use Saifur\FileManager\app\Facades\Helpers\SFMCommonFacade;
use Saifur\FileManager\app\Exceptions\DirectoryNotFoundException;

class LocalDirectory implements DirectoryManager
{
    public function getFiles($params = [])
    {
        $path = $params['path'] ?? '';
        $path = SFMCommonFacade::pathCleaning(['path' => $path]);
        $dir = SFMCommonFacade::getRootPath().$path;

        if(!file_exists($dir))
        {
            throw new DirectoryNotFoundException($params);
        }

        $files = array_values(array_diff(scandir($dir), ['.', '..']));
        return $files;
    }

    public function getFilesWithDetails($params = [])
    {
        $file_path = $params['path'] ?? '';
        $dir = SFMCommonFacade::getRootPath().$file_path;

        if(!file_exists($dir))
        {
            throw new DirectoryNotFoundException($params);
        }

        $files = array_values(array_diff(scandir($dir), ['.', '..']));

        $formatted_files = [];

        foreach ($files as $file){
            $full_path = $dir.'/'.$file;
            $formatted_files[] = [
                'file_name' => $file,
                'is_file' => is_file($full_path),
                'extension' => pathinfo($full_path, PATHINFO_EXTENSION),
                'file_path' => $full_path,
                'base_file_path' => $file_path,
                'file_size' => SFMCommonFacade::convertDataSize(filesize($full_path)),
            ];
        }

        $formatted_files = collect($formatted_files);
        $formatted_files = $formatted_files->sortBy('is_file')->values();
        return $formatted_files;
    }

    public function createDirectory($params)
    {
        $path = $params['path'] ?? '';
        $chmod = $params['chmod'] ?? '0777';
        $path = SFMCommonFacade::pathCleaning(['path' => $path]);
        $dir = SFMCommonFacade::getRootPath().$path;

        if (!file_exists($dir))
        {
            File::ensureDirectoryExists($dir);
        }

    }

    public function deleteDirectory($params)
    {
        $path = $params['path'] ?? '';
        $path = SFMCommonFacade::pathCleaning(['path' => $path]);
        $dir = SFMCommonFacade::getRootPath().$path;

        if (!file_exists($dir))
        {
            throw new DirectoryNotFoundException($params);
        }

        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) {
            $filePath = $dir . '/' . $file;

            if (is_dir($filePath)) {
                $filePath = $path . '/' . $file;  // this is not full path
                $this->deleteDirectory(['path' => $filePath]); // Recursively delete subdirectories
            } else {
                unlink($filePath); // Delete individual files
            }
        }

        rmdir($dir); // Finally, delete the empty directory
    }

    public function renameDirectory($params)
    {
        $path = $params['path'] ?? '';
        $new_name = $params['new_name'] ?? '';
        $new_name = str_replace(' ', '_', $new_name);
        $path = SFMCommonFacade::pathCleaning(['path' => $path]);
        $dir = SFMCommonFacade::getRootPath().$path;

        if (!file_exists($dir))
        {
            throw new DirectoryNotFoundException($params);
        }

        if (!is_dir($dir)) {
            return;
        }

        $oldDirectoryName = $dir;
        $lastSlashPos = strrpos($dir, '/');
        $newDirectoryName = substr($dir, 0, $lastSlashPos + 1).$new_name;

        rename($oldDirectoryName, $newDirectoryName);
    }


    public function copyDirectory($params)
    {
        $source_directory = $params['source_directory'] ?? '';
        $source_directory_path = SFMCommonFacade::pathCleaning(['path' => $source_directory]);
        $source_directory_full_path = SFMCommonFacade::getRootPath().$source_directory_path ;

        $destination_directory = $params['destination_directory'] ?? '';
        $destination_directory_path = SFMCommonFacade::pathCleaning(['path' => $destination_directory]);
        $destination_directory_full_path = SFMCommonFacade::getRootPath().$destination_directory_path ;

        if (!file_exists($source_directory_full_path) )
        {
            throw new DirectoryNotFoundException(['message' => 'Invalid source directory!']);
        }

        // Create the destination directory if not exists
        if (!file_exists($destination_directory_full_path) )
        {
            mkdir($destination_directory_full_path);
        }

        $dirHandle = opendir($source_directory_full_path);

        while ($file = readdir($dirHandle)) {
            if ($file !== '.' && $file !== '..') {

                if (is_dir($source_directory_full_path . DIRECTORY_SEPARATOR . $file)) {  // Directory : passing only directory path not full path
                    $sourcePath = $source_directory_path . DIRECTORY_SEPARATOR . $file;
                    $destinationPath = $destination_directory_path . DIRECTORY_SEPARATOR . $file;
                    // If it's a subdirectory, recursively call the function to copy it
                    $this->copyDirectory(['source_directory' => $sourcePath, 'destination_directory' => $destinationPath]);
                } else {  // File
                    $sourcePath = $source_directory_full_path . DIRECTORY_SEPARATOR . $file;
                    $destinationPath = $destination_directory_full_path . DIRECTORY_SEPARATOR . $file;
                    // If it's a file, copy it to the destination
                    copy($sourcePath, $destinationPath);
                }
            }
        }

        closedir($dirHandle);
    }


    public function moveDirectory($params)
    {
        $source_directory = $params['source_directory'] ?? '';
        $source_directory_path = SFMCommonFacade::pathCleaning(['path' => $source_directory]);
        $source_directory_full_path = SFMCommonFacade::getRootPath().$source_directory_path ;

        $destination_directory = $params['destination_directory'] ?? '';
        $destination_directory_path = SFMCommonFacade::pathCleaning(['path' => $destination_directory]);
        $destination_directory_full_path = SFMCommonFacade::getRootPath().$destination_directory_path ;

        $this->copyDirectory($params);
        $this->deleteDirectory(['path' => $source_directory]);
    }
}
