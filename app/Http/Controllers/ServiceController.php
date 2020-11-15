<?php

namespace App\Http\Controllers;

use App\ServiceEvacuation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = ServiceEvacuation::all();
        return response()->json([
            'services' => $services
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
        $services = new ServiceEvacuation([
            'label_serv' => $request->get('label_serv'),
            'objectif' => $request->get('objectif'),
            'mission' => $request->get('mission'),
            'description' => $request->get('description'),
            'adress_id' => $request->get('adress_id'),
        ]);
        $services->save();
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
        $services = ServiceEvacuation::find($id);
        if (!$services) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'services' => $services
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
        $services = ServiceEvacuation::where('id', $id);
        if (!$services) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $label_serv = $request->input('label_serv');
        $objectif = $request->input('objectif');
        $mission = $request->input('mission');
        $description = $request->input('description');
        $adress_id = $request->input('adress_id');

        $services->label_serv = $label_serv;
        $services->objectif = $objectif;
        $services->mission = $mission;
        $services->description = $description;
        $services->adress_id = $adress_id;

        $services->save();

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
        $services = ServiceEvacuation::find($id);
        if (!$services) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $services->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
