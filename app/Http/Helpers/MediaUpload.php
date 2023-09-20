<?php

namespace App\Http\Helpers;

use Illuminate\Support\Carbon;

trait MediaUpload{

    function singleMideaUpload($file,$folder = "others"){
        if($file){
            
            $ext = $file->extension();
            $imgName = auth()->user()->name.'-'. Carbon::now()->format('d-m-y-h-m-i'). '.'.$ext;
            $filePath = $file->storeAs($folder,$imgName,'public');
            
            $fileUrl = asset('storage/'.$filePath);
            $fileInfo=[
                "fileName" => $imgName,
                "fileUrl" => $fileUrl,
            ];

            return $fileInfo;
        
        }
    }

    function unAuthsingleMideaUpload($file,$folder = "others"){
        if($file){
            
            $ext = $file->extension();
            $imgName = 'jobPost'.'-'. Carbon::now()->format('d-m-y-h-m-i'). '.'.$ext;
            $filePath = $file->storeAs($folder,$imgName,'public');
            
            $fileUrl = asset('storage/'.$filePath);
            $fileInfo=[
                "fileName" => $imgName,
                "fileUrl" => $fileUrl,
            ];

            return $fileInfo;
        
        }
    }
}