<?php

namespace App\Http\Controllers;

use App\Abonne;
use Illuminate\Http\Request;

use App\Agent;
use App\Personne;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personne = Personne::all();
        return response()->json([
            "personne" => $personne
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
        $personne = new Personne([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephon' => $request->get('telephon'),
            'adresse_id' => $request->get('adresse_id'),
        ]);
        $personne->save();
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
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json([
                'Donnée non trouver'
            ], 500);
        }
        return response()->json([
            'adresses' => $personne
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
        $personne = Personne::where('id', $id)->first();
        if (!$personne) {
            return response()->json([
                'Donnée non sauvegarder'
            ], 500);
        }
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephon = $request->input("telephon");
        $adresse_id = $request->input("adresse_id");

        $personne->nom = $nom;
        $personne->prenom = $prenom;
        $personne->telephon = $telephon;
        $personne->adresse_id = $adresse_id;

        $personne->save();
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
        $personne = Personne::find($id);
        if (!$personne) {
            return response()->json([
                'Donnée non trouver'
            ], 200);
        }
        $personne->delete();
        return response()->json([
            'Donnée Suprimer avec success'
        ], 201);
    }

    public function AddAgent(Request $request)
    {
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephon = $request->input("telephon");
        $adresse_id = $request->input("adresse_id");
        $personn_id = $request->input('personn_id');
        $fonct_id = $request->input('fonct_id');
        $serv_id = $request->input('serv_id');


        $agent = Agent::where('personn_id', $personn_id)->where('fonct_id', $fonct_id)
            ->where('serv_id', $serv_id)->first();

        if (!$agent) {
            $agent = new Agent();
        }
        $personne = new Personne();
        $personne->nom = $nom;
        $personne->prenom = $prenom;
        $personne->telephon = $telephon;
        $personne->adresse_id = $adresse_id;
        $agent->personn_id = $personn_id;
        $agent->fonct_id = $fonct_id;
        $agent->serv_id = $serv_id;

        $personne->save();

        return response()->json([
            'message' => 'données enregistrer'
        ], 201);
    }

    public function AddAbone(Request $request)
    {
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephon = $request->input("telephon");
        $adresse_id = $request->input("adresse_id");
        $personn_id = $request->input('personn_id');


        $abonne = Abonne::where('personn_id', $personn_id)->first();

        if (!$abonne) {
            $abonne = new Abonne();
        }
        $personne = new Personne();
        $personne->nom = $nom;
        $personne->prenom = $prenom;
        $personne->telephon = $telephon;
        $personne->adresse_id = $adresse_id;
        $abonne->personn_id = $personn_id;

        $personne->save();

        return response()->json([
            'message' => 'données enregistrer'
        ], 201);
    }
}
