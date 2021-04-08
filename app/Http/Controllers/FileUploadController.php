<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function fileUploadPost(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = $file->getClientOriginalName();

        Storage::putFileAs('images/', $file, $fileName);

        Media::create([
            'name' => $fileName,
            'path' => 'images',
        ]);

        $media = [];

        foreach (Media::all() as $value) {
            array_push($media, Storage::url($value->path . '/' . $value->name));
        }

        return view('welcome', compact('media'));
    }
}
