<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function fileUploadPost(Request $request)
    {
        $file = $request->file('fileToUpload');

        Storage::putFileAs('images/', $file, $file->getClientOriginalName());
    }
}
