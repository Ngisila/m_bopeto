<?php

namespace App\Http\Controllers;

use App\Mode_Paiement;
use Illuminate\Http\Request;

class ModePaieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modes = Mode_Paiement::all();
        return response()->json([
            'modes' => $modes
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modes = new Mode_Paiement([
            'lib_mod_paie' => $request->get('lib_mod_paie')
        ]);
        $modes->save();
        return response()->json([
            'Donnee enregistrer'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modes = Mode_Paiement::find($id);
        if (!$modes) {
            return response()->json([
                'Donnee non trouver'
            ], 400);
        }
        return response()->json([
            'modes' => $modes
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modes = Mode_Paiement::where('id', $id)->first();
        if (!$modes) {
            return response()->json([
                'Donnee non enregistre'
            ], 500);
        }
        $lib_mod_paie = $request->input('lib_mod_paie');
        $modes->lib_mod_paie = $lib_mod_paie;
        $modes->save();
        return response()->json([
            'Donnee updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modes = Mode_Paiement::find($id);
        if (!$modes) {
            return response()->json([
                'Donnee non trouver'
            ], 200);
        }
        $modes->delete();
        return response()->json([
            'Donnee supprimer'
        ], 201);
    }
}
