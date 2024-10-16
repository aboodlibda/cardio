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
}
