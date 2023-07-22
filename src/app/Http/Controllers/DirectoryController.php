<?php

namespace Saifur\FileManager\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Saifur\FileManager\app\Traits\ApiResponser;
use Saifur\FileManager\app\Modules\Directory\LocalDirectory;
use Saifur\FileManager\app\Exceptions\DirectoryNotFoundException;

class DirectoryController extends Controller
{
    use ApiResponser;


    // getFiles
    public function getFiles(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory
        $files = $directory->getFiles(['path' => $request->path]); // get files
        return $this->set_response($files,  200,'success', ['Success']);
    }

    public function getFiles2(Request $request)
    {
        try {
            $directory = new LocalDirectory();  // the local directory
            $files = $directory->getFiles(['path' => $request->path]); // get files
            return $this->set_response($files,  200,'success', ['Success']);
        } catch (DirectoryNotFoundException $exception) {
            return $this->set_response(null,  422,'error', [$exception->getMessage()]);
        }
    }

    public function getFilesWithDetails(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory
        $files = $directory->getFilesWithDetails(['path' => $request->path]); // get files
        return $this->set_response($files,  200,'success', ['Success']);
    }

    public function createDirectory(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory

        $directory->createDirectory(['path' => $request->path]);
        return $this->set_response(null,  200,'success', ['Success']);
    }

    public function deleteDirectory(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory

        $directory->deleteDirectory(['path' => $request->path]);
        return $this->set_response(null,  200,'success', ['Success']);
    }

    public function renameDirectory(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory

        $directory->renameDirectory(['path' => $request->path, 'new_name' => $request->new_name]);
        return $this->set_response(null,  200,'success', ['Success']);
    }

    public function copyDirectory(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory

        $directory->copyDirectory(['source_directory' => $request->source_directory, 'destination_directory' => $request->destination_directory]);
        return $this->set_response(null,  200,'success', ['Success']);
    }

    public function moveDirectory(Request $request)
    {
        $directory = new LocalDirectory();  // the local directory

        $directory->moveDirectory(['source_directory' => $request->source_directory, 'destination_directory' => $request->destination_directory]);
        return $this->set_response(null,  200,'success', ['Success']);
    }
}
