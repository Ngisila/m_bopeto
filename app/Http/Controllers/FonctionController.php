<?php

namespace App\Http\Controllers;

use App\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::all();
        return response()->json([
            'fonction' => $fonctions
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
        $fonctions = new Fonction([
            'libel_fonction' => $request->get('libel_fonction')
        ]);
        $fonctions->save();
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
        $fonction = Fonction::find($id);
        if (!$fonction) {
            return response()->json([
                'Donnee non trouver'
            ], 400);
        }
        return response()->json([
            'modes' => $fonction
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
        $fonctions = Fonction::where('id', $id)->first();
        if (!$fonctions) {
            return response()->json([
                'Donnee non enregistre'
            ], 500);
        }
        $libel_fonction = $request->input('libel_fonction');
        $fonctions->libel_fonction = $libel_fonction;
        $fonctions->save();

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
        $fonctions = Fonction::find($id);
        if (!$fonctions) {
            return response()->json([
                'Donnee non trouver'
            ], 200);
        }
        $fonctions->delete();
        return response()->json([
            'Donnee supprimer'
        ], 201);
    }
}
