<?php

namespace App\Services;

use Illuminate\Http\Request;



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
    public function uploadImages(Request $request, $fileKey  , $directory)
    {
        if ($request->hasFile($fileKey)) {
            $images = $request->file($fileKey);
            $imageName = time() . '_' . uniqid() . '.' . $images->getClientOriginalExtension();
            $path = $images->storeAs($directory, $imageName, 'public');
            return $path;
        }else{
            return null;

        }

    }

}
