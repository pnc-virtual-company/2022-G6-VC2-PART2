<?php

namespace App\Http\Controllers;

use App\Models\Ero;
use Illuminate\Http\Request;

class EroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ero::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eros = new Ero();
        $eros->user_id = $request->user_id;
        $eros->gender = $request ->gender;
        $eros->phone = $request ->phone;
        $eros->telegram = $request ->telegram;
        $eros->save();
        return response()->json(['sms'=>$eros]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ero  $ero
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ero::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ero  $ero
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ero  $ero
     * @return \Illuminate\Http\Response
     */
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
