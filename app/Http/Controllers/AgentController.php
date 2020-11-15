<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agent = Agent::all();
        return response()->json([
            'agent' => $agent
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
        $agent = new Agent([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('telephone'),
            'fonct_id' => $request->get('fonct_id'),
            'servi_id' => $request->get('servi_id'),
        ]);
        $agent->save();
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
        $agent = Agent::find($id);
        if (!$agent) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'agent' => $agent
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
        $agent = Agent::where('id', $id);
        if (!$agent) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $telephone = $request->input('telephone');
        $fonct_id = $request->input('fonct_id');
        $servi_id = $request->input('servi_id');

        $agent->nom = $nom;
        $agent->prenom = $prenom;
        $agent->telephone = $telephone;
        $agent->fonct_id = $fonct_id;
        $agent->servi_id = $servi_id;

        $agent->save();

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
        $agent = Agent::find($id);
        if (!$agent) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $agent->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
