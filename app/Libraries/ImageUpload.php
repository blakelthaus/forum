<?php


namespace App\Libraries;


use Illuminate\Http\UploadedFile;

class ImageUpload
{
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $fileName = null)
    {
        $name = !is_null($fileName) ? $fileName : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
