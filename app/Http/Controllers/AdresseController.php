<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adresse;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adresses = Adresse::all();

        return response()->json([
            'adresse' => $adresses
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
        $adresses = new Adresse([
            'num_parc' => $request->get('num_parc'),
            'avenue' => $request->get('avenue'),
            'quartier' => $request->get('quartier'),
            'commune' => $request->get('commune'),
        ]);
        $adresses->save();
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
        $adresses = Adresse::find($id);
        if (!$adresses) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'adresses' => $adresses
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
        $adresses = Adresse::where('id', $id)->first();
        if (!$adresses) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }

        $num_parc = $request->input('num_parc');
        $avenue = $request->input('avenue');
        $quartier = $request->input('quartier');
        $commune = $request->input('commune');

        $adresses->num_parc = $num_parc;
        $adresses->avenue = $avenue;
        $adresses->quartier = $quartier;
        $adresses->commune = $commune;

        $adresses->save();
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
        $adresses = Adresse::find($id);
        if (!$adresses) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $adresses->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
