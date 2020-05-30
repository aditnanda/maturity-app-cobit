<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function chart(Request $request){

        $image = $request['file'];

        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'chart' . '.png';
    
        $file = base64_decode($image);
        $folderName = 'public/chart/';
        $destinationPath = public_path() . $folderName;
        $success = file_put_contents(public_path().'/chart/'.$imageName, $file);
        return $success;
    }
}
