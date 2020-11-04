<?php

namespace App\Http\Controllers;

use App\Frequence;
use Illuminate\Http\Request;

class FrequenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $frequences = Frequence::all();
        return response()->json([
            'frequence' => $frequences
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
        $frequences = new Frequence([
            'libelle' => $request->get('libelle')
        ]);
        $frequences->save();
        return response()->json([
            'Donnee Enregistre'
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
        $frequences = Frequence::find($id);
        if (!$frequences) {
            return response()->json([
                'Donnee non trouver'
            ], 500);
        }
        return response()->json([
            'frequences' => $frequences
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
        //
        $frequences = Frequence::where('id', $id)->first();
        if (!$frequences) {
            return response()->json([
                'Donnee non enregistrer'
            ], 500);
        }
        $libelle = $request->input('libelle');
        $frequences->libelle = $libelle;
        $frequences->save();
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
        //
        $frequences = Frequence::find($id);
        if (!$frequences) {
            return response()->json([
                'Donnee non trouver'
            ], 200);
        }
        $frequences->delete();
        return response()->json([
            'Donnee supprimer'
        ], 201);
    }
}
