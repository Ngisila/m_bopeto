<?php

namespace App\Http\Controllers;

use App\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiement = Paiement::all();
        return response()->json([
            "paiement" => $paiement
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
        $paiement = new Paiement([
            'num_paie' => $request->get('num_paie'),
            'mont_paie' => $request->get('mont_paie'),
            'mode_paie_id' => $request->get('mode_paie_id'),
            'agent_id' => $request->get('agent_id'),
        ]);

        $paiement->save();
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
        $paiement = Paiement::find($id);
        if (!$paiement) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'adresses' => $paiement
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
        $paiement = Paiement::where('id', $id)->first();
        if (!$paiement) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }

        $num_paie = $request->input('num_paie');
        $mont_paie = $request->input('mont_paie');
        $mode_paie_id = $request->input('mode_paie_id');
        $agent_id = $request->input('agent_id');

        $paiement->num_paie = $num_paie;
        $paiement->mont_paie = $mont_paie;
        $paiement->mode_paie_id = $mode_paie_id;
        $paiement->agent_id = $agent_id;

        $paiement->save();
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
        $paiement = Paiement::find($id);
        if (!$paiement) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $paiement->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
