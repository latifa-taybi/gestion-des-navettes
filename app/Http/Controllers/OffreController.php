<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOffreRequest;
use App\Models\Offre;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function create(){
        return view('offre.create');
    }

    public function index(){
        $user = Auth::user();

        if ($user->role_id === 2) {
            $offres = Offre::all();
            return view('dashboard.offre', compact('offres'));
        } else {

            $offres = Offre::where('user_id', $user->id)->get();
            return view('dashboard.reservation', compact('offres'));
        }


        // $offres = Offre::all();
        // return view('dashboard.offre', compact('offres'));
    }

    public function store(StoreOffreRequest $request){
        
        Offre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'date_depart' => $request->date_depart,
            'date_arrivee' => $request->date_arrivee,
            'place_dispo' => $request->place_dispo,
            'prix' => $request->prix,
            'societe_id' => Societe::id()
        ]);
        
        return redirect('dashboard.offre');

    }

    public function edit($id){
        $offre = Offre::find($id);
        return view('offre.edit', compact("offre"));
    }

    public function update(StoreOffreRequest $request,$id){
        $offre = Offre::find($id);
        $offre->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'date_depart' => $request->date_depart,
            'date_arrivee' => $request->date_arrivee,
            'place_dispo' => $request->place_dispo,
            'prix' => $request->prix,
            'societe_id' => $request->societe_id
        ]);

        return redirect("dashboard.offre");
    }

    public function delete($id){
        $offre = Offre::find($id);
        $offre->delete();
        return redirect("dashboard.offre");
    }
    



}
