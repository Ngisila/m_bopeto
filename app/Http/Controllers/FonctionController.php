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
        //
        $fonction = Fonction::all();
        return response()->json([
            'fonction' => $fonction
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
        //
        $fonction = new Fonction([
            'libel_fonction' => $request->get('libel_fonction')
        ]);
        $fonction->save();
        return response()->json([
            'Donnée enregistrer'
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
        //
        $fonction = Fonction::find($id);
        if (!$fonction) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'fonction' => $fonction
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
        $fonction = Fonction::where('id', $id);
        if (!$fonction) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $libel_fonction = $request->input('libel_fonction');
        $fonction->libel_fonction = $libel_fonction;

        $fonction->save();

        return response()->json([
            'Adresse upate'
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
        $fonction = Fonction::find($id);
        if (!$fonction) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $fonction->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
