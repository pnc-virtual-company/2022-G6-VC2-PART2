<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkExperience;

class ProfileController extends Controller
{
    //================== upload profile ======================
    public function uploadCompanyProfile(Request $request, $id){
        $path = public_path('company_profile');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('company_profile');

        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $fileName);
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->company_profile = asset('profile/' . $fileName);
        $workExperience->save();
        return response()->json(['sms' => $workExperience]);
    }
}
