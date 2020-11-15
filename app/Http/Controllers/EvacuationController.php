<?php

namespace App\Http\Controllers;

use App\Evacuation;
use Illuminate\Http\Request;

class EvacuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $evac = Evacuation::all();
        return response()->json([
            'evac' => $evac
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
        $evac = new Evacuation([
            'confirmation' => $request->get('confirmation'),
            'observation' => $request->get('observation'),
            'abonne_id' => $request->get('abonne_id'),
            'frequen_id' => $request->get('frequen_id'),
            'type_id' => $request->get('type_id'),
            'agent_id' => $request->get('agent_id'),
        ]);
        $evac->save();
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
        $evac = Evacuation::find($id);
        if (!$evac) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'evac' => $evac
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
        $evac = Evacuation::where('id', $id);
        if (!$evac) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $confirmation = $request->input('confirmation');
        $observation = $request->input('observation');
        $abonne_id = $request->input('abonne_id');
        $frequen_id = $request->input('frequen_id');
        $type_id = $request->input('type_id');
        $agent_id = $request->input('agent_id');

        $evac->confirmation = $confirmation;
        $evac->observation = $observation;
        $evac->abonne_id = $abonne_id;
        $evac->frequen_id = $frequen_id;
        $evac->type_id = $type_id;
        $evac->agent_id = $agent_id;

        $evac->save();

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
        $evac = Evacuation::find($id);
        if (!$evac) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $evac->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
