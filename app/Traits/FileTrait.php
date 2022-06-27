<?php

namespace App\Traits;

/**
 * Installation: composer require intervention/image
 */

use Illuminate\Support\Facades\Storage;
use Image;

trait FileTrait
{

    public function storeImage($fileTemp, $path="files")
    {
        if ($fileTemp != "" && $fileTemp != null) {
            $filename = hash('sha256', $fileTemp->getClientOriginalName() . now());
            $ext = pathinfo($fileTemp->getClientOriginalName(), PATHINFO_EXTENSION);
            $filenameTemp = $filename . "." . $ext;

            $result = $fileTemp->storeAs("public/$path/", $filenameTemp);
            $realPath = $fileTemp->getRealPath();
            $realPathFull = Storage::disk('local')->path("public/$path/" . $filenameTemp);
            $imgSize = getimagesize($fileTemp->getRealPath());
            if ($imgSize[0] > 1280) {
                $img = Image::make($fileTemp->getRealPath());

                $img->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($realPathFull);
            }
            
            return "/$path/$filenameTemp";
        }
    }

    public function deleteFile($file){
        return unlink(storage_path('app/public'. $file));
    }
}
