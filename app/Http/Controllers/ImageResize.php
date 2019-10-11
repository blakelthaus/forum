<?php

namespace App\Http\Controllers;

use App\Libraries\ImageUpload;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ImageResize extends Controller
{
    protected $imageUploader;

    public function __construct(ImageUpload $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }

    public function index()
    {
        return view('blake.resize');
    }

    public function resize(Request $request)
    {
        $width = $request->width;
        $height = $request->height;
        $file = $this->imageUploader->uploadImage($request->image);

        $filePath = storage_path() . '/app/public/';
        $savePath = 'storage/app/public/resized-images/' . $file;

        $process = new Process("python3 python/resize-image.py {$width} {$height} {$filePath} {$file}");
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
            return false;
        } else {
            return view('blake.resized-image', ['path' => $savePath]);
        }

    }
}
