<?php

namespace App\Http\Controllers;

use App\Models\Ero;
use Illuminate\Http\Request;

class EroController extends Controller
{
   //========================= show all Ero ==========================
    public function index()
    {
        return Ero::with('user')->get();
    }
   //========================= add new Ero ==========================
    public function store(Request $request, $id)
    {
        $eros = new Ero();
        $eros->user_id = $id;
        $eros->gender = $request ->gender;
        $eros->phone = $request ->phone;
        $eros->telegram = $request ->telegram;
        $eros->save();
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
        $eros->user_id = $request->user_id;
        $eros->gender = $request ->gender;
        $eros->phone = $request ->phone;
        $eros->telegram = $request ->telegram;
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
