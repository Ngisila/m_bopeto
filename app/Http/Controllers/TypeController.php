<?php

namespace App\Http\Controllers;

use App\Type_evacuation;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type_evacuation::all();
        return response()->json([
            "types" => $types
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
        $types = new Type_evacuation([
            'libevac' => $request->get('libevac')
        ]);
        $types->save();
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
        $types = Type_evacuation::find($id);
        if (!$types) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'types' => $types
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
        $types = Type_evacuation::where('id', $id)->first();
        if (!$types) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $libevac = $request->input("libevac");

        $types->libevac = $libevac;

        $types->save();
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
        $types = Type_evacuation::find($id);
        if (!$types) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $types->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }
}
