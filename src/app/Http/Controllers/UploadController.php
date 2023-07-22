<?php

namespace Saifur\FileManager\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Saifur\FileManager\app\Traits\ApiResponser;
use Saifur\FileManager\app\Facades\Helpers\SFMCommonFacade;

class UploadController extends Controller
{
    use ApiResponser;


    // public function fileUpload(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //             'document' => 'required|mimes:png,jpg,jpeg,jfif,webp,gif,doc,docx,csv,xls,xlsx,pdf|max:500',
    //             'file_location' => 'required',
    //             'doc_name' => 'required',
    //         ],
    //         [
    //             'document.max' => 'File size should be max 500 KB'
    //         ]
    //     );
    //     if ($validator->fails()) {
    //         return $this->set_response(null, 422, 'failed', $validator->errors()->all());
    //     }

    //     $user = Auth::user();

    //     try {
    //         $file_location = $request->file_location;
    //         $doc_name = $request->doc_name;
    //         [$file_path] = getProcessFile($request->document, $doc_name, $file_location);

    //         return $this->set_response(['file_path'=>$file_path],  200,'success', ['File uploaded successfully']);
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         $logMessage = formatCommonErrorLogMessage($e);
    //         writeToLog($logMessage, 'debug');
    //         return $this->set_response(null,  422,'error', ['Something went wrong. Please try again later!']);
    //     }
    // }

    public function fileUpload(Request $request)
    {
        try {
            $file_location = $request->file_location;
            $doc_name = $request->doc_name;
            $data = getProcessFile($request->file, $doc_name, $file_location);

            return $this->set_response($data,  200,'success', ['File uploaded successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            $logMessage = formatCommonErrorLogMessage($e);
            SFMCommonFacade::writeToLog($logMessage, 'debug');
            return $this->set_response(null,  422,'error', ['Something went wrong. Please try again later!']);
        }
    }

}
