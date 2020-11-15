<?php

namespace App\Http\Controllers;

use App\Abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abonne = Abonne::all();
        return response()->json([
            'abonne' => $abonne
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
        $abonne = new Abonne([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('telephone'),
            'adress_id' => $request->get('adress_id'),
            'frequence_id' => $request->get('frequence_id'),
            'servi_id' => $request->get('servi_id'),
        ]);
        $abonne->save();
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
        $abonne = Abonne::find($id);
        if (!$abonne) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'abonne' => $abonne
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
        $abonne = Abonne::where('id', $id);
        if (!$abonne) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $telephone = $request->input('telephone');
        $adress_id = $request->input('adress_id');
        $frequence_id = $request->input('frequence_id');
        $servi_id = $request->input('servi_id');

        $abonne->nom = $nom;
        $abonne->prenom = $prenom;
        $abonne->telephone = $telephone;
        $abonne->adress_id = $adress_id;
        $abonne->frequence_id = $frequence_id;
        $abonne->servi_id = $servi_id;

        $abonne->save();

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
        $abonne = Abonne::find($id);
        if (!$abonne) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $abonne->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
