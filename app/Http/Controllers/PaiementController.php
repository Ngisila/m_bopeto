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
        //
        $paiement = Paiement::all();
        return response()->json([
            'paiement' => $paiement
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
        $paiement = new Paiement([
            'num_paiement' => $request->get('num_paiement'),
            'mont_paiemen' => $request->get('mont_paiemen'),
            'mode_id' => $request->get('mode_id'),
            'agent_id' => $request->get('agent_id'),
            'evac_id' => $request->get('evac_id'),
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
        //
        $paiement = Paiement::find($id);
        if (!$paiement) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'paiement' => $paiement
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
        $paiement = Paiement::where('id', $id);
        if (!$paiement) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $num_paiement = $request->input('num_paiement');
        $mont_paiemen = $request->input('mont_paiemen');
        $mode_id = $request->input('mode_id');
        $agent_id = $request->input('agent_id');
        $evac_id = $request->input('evac_id');

        $paiement->num_paiement = $num_paiement;
        $paiement->mont_paiemen = $mont_paiemen;
        $paiement->mode_id = $mode_id;
        $paiement->agent_id = $agent_id;
        $paiement->evac_id = $evac_id;

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
        //
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
