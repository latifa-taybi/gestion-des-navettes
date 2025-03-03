<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocieteRquest;
use App\Models\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocieteController extends Controller
{
    public function create(){
        return view('formSociete');
    }

    public function store(StoreSocieteRquest $request){
        $user = Auth::user();
        Societe::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'description' => $request->description,
            'email' => $request->email,
            'tele' => $request->tele,
            'user_id'=>$user->id
        ]);
    }


}
