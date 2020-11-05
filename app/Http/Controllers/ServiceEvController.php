<?php

namespace App\Http\Controllers;

use App\Service_Evacuation;
use Illuminate\Http\Request;

class ServiceEvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service_Evacuation::all();
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
        $services = new Service_Evacuation([
            'label_serv' => $request->get('label_serv'),
            'objectif' => $request->get('objectif'),
            'mission' => $request->get('mission'),
            'description' => $request->get('description'),
        ]);
        $services->save();
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
        $services = Service_Evacuation::find($id);
        if (!$services) {
            return response()->json([
                'Donnee non trouver'
            ], 400);
        }
        return response()->json([
            'modes' => $services
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
        $services = Service_Evacuation::where('id', $id)->first();
        if (!$services) {
            return response()->json([
                'Donnee non enregistre'
            ], 500);
        }
        $label_serv = $request->input('label_serv');
        $objectif = $request->input('objectif');
        $mission = $request->input('mission');
        $description = $request->input('description');

        $services->label_serv = $label_serv;
        $services->objectif = $objectif;
        $services->mission = $mission;
        $services->description = $description;

        $services->save();

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
        $services = Service_Evacuation::find($id);

        if (!$services) {
            return response()->json([
                'Donnee non trouver'
            ], 200);
        }
        $services->delete();
        return response()->json([
            'Donnee supprimer'
        ], 201);
    }
}
