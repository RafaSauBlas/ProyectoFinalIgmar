<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Subir extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('file');
        $nombre = $request->nombre;

        return $request;

        // $path = Storage::putFile('file', $image, 'public');
        
        // $url = Storage::disk('do')->url($path);
        // return $url;
    }
}
