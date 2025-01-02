<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageUploadService
{
    public function upload(Request $request, $fileKey  , $directory)
    {
        if ($request->hasFile($fileKey)) {
            $image = $request->file($fileKey);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs($directory, $imageName, 'public');
            return $path;
        }else{
            return null;

        }

    }
//    public function uploadImages(Request $request, $fileKey  , $directory)
//    {
//        if ($request->hasFile($fileKey)) {
//            $images = $request->file($fileKey);
//            $imageName = time() . '_' . uniqid() . '.' . $images->getClientOriginalExtension();
//            $path = $images->storeAs($directory, $imageName, 'public');
//            return $path;
//        }else{
//            return null;
//
//        }
//
//    }
    public function uploadImages($request, $inputName, $folder)
    {
        $uploadedImages = [];

        if ($request->hasFile($inputName)) {
            foreach ($request->file($inputName) as $file) {
                $fileName = time().'_'.uniqid() . '_' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs($folder, $fileName, 'public');
                $uploadedImages[] = $filePath;
            }
        }

        return $uploadedImages;
    }

//    public function moveImages(array $uploadedFiles, $destinationFolder)
//    {
//        $savedFiles = [];
//
//        foreach ($uploadedFiles as $fileName) {
//            $sourcePath = storage_path('tmp/uploads/' . $fileName);
//            $destinationPath = storage_path($destinationFolder . '/' . $fileName);
//
//            if (file_exists($sourcePath)) {
//                if (!file_exists(storage_path($destinationFolder))) {
//                    mkdir(storage_path($destinationFolder), 0777, true);
//                }
//
//                rename($sourcePath, $destinationPath);
//
//                $savedFiles[] = $destinationFolder . '/' . $fileName;
//            }
//        }
//
//        return $savedFiles;
//    }


    public function moveImages(array $uploadedFiles, $destinationFolder)
    {
        $savedFiles = [];

        foreach ($uploadedFiles as $fileName) {
            $sourcePath = storage_path('tmp/uploads/' . $fileName);
            if (file_exists($sourcePath)) {
                $newFilePath =  Storage::disk('public')->putFileAs($destinationFolder, $sourcePath, $fileName);
                if($newFilePath){
                    $savedFiles[] =  $destinationFolder . '/' . $fileName;
                    unlink($sourcePath);
                }
            }
        }

        return $savedFiles;
    }

}
