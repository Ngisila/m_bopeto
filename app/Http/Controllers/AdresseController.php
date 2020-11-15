<?php

namespace App\Http\Controllers;

use App\Adresse;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adresse = Adresse::all();
        return response()->json([
            'adresse' => $adresse
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
        $adresse = new Adresse([
            'num_parc' => $request->get('num_parc'),
            'avenue' => $request->get('avenue'),
            'quartier' => $request->get('quartier'),
            'commune' => $request->get('commune'),
        ]);
        $adresse->save();
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
        $adresse = Adresse::find($id);
        if (!$adresse) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'adresses' => $adresse
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
        $adresse = Adresse::where('id', $id);
        if (!$adresse) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $num_parc = $request->input('num_parc');
        $avenue = $request->input('avenue');
        $quartier = $request->input('quartier');
        $commune = $request->input('commune');

        $adresse->num_parc = $num_parc;
        $adresse->avenue = $avenue;
        $adresse->quartier = $quartier;
        $adresse->commune = $commune;

        $adresse->save();
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
        $adresse = Adresse::find($id);
        if (!$adresse) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $adresse->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
