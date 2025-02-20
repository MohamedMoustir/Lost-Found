<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\claims;

class claimsControler extends Controller
{
    public function found(request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'annonce_id' => 'required',
            'type' => 'required',

        ]);

        Claims::create([
            'user_id' => $request->user_id,
            'message' => 'Lobjet que vous cherchiez a été retrouvé ',
            'announcement_id' => $request->annonce_id,
            'type' => $request->type,
        ]);
        session()->flash('status', 'Votre objet a bien été retrouvé !');

        return redirect()->back();
    }
    public function lost(request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'annonce_id' => 'required',
            'type' => 'required',

        ]);

        Claims::create([
            'user_id' => $request->user_id,
            'message' => 'Cest à moi ! ',
            'announcement_id' => $request->annonce_id,
            'type' => $request->type,
        ]);
        session()->flash('status', 'request enregistré avec succès !!');

        return redirect()->back();
    }
}
