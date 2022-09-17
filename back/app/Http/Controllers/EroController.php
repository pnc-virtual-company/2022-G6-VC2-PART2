<?php

namespace App\Http\Controllers;

use App\Models\Ero;
use Illuminate\Http\Request;

class EroController extends Controller
{
   //========================= show all Ero ==========================
    public function index()
    {
        return Ero::get();
    }
   //========================= add new Ero ==========================
    public function store(Request $request)
    {
        $eros = new Ero();
        $eros->username = $request->username;
        $eros->email = $request->email;
        $eros->password = bcrypt($request->password);
        $eros->role= $request->role;
        $eros->save();
        return response()->json(['sms'=>$eros]);
    }
   //========================= show only one Ero ==========================
    public function show($id)
    {
        return Ero::findOrFail($id);
    }
    //========================= update Ero ==========================
    public function update(Request $request, $id)
    {
        $eros = Ero::findOrFail($id);
        $eros->username = $request->username;
        $eros->email = $request->email;
        $eros->password = bcrypt($request->password);
        $eros->role= $request->role;
        $eros->save();
        return response()->json(['sms'=>$eros]);
    }
   //========================= delete Ero ==========================
    public function destroy($id)
    {
        $iSDelete = Ero::destroy($id);
        if ($iSDelete === 1) {
            return response()->json(['message' => 'Ero deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Ero cannot delete'], 404);
        }
    }
}
