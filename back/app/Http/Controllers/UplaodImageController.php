<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;

class UplaodImageController extends Controller
{
    public function uploadProfile(Request $request){
        $path = public_path('profile');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');

        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $fileName);
        
        return asset('profile/' . $fileName);
    }
}
