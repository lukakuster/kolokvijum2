<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class korisniciController extends Controller
{
    public function index()
    {
        $data = \App\Models\korisnici::all();
        return $data;
    }

    public function store(Request $request)
    {
        $data = \App\Models\korisnici::create($request->all());
        return $data;
    }

//    public function store1(Request $request)
//    {
//        $data = \App\Models\korisnici::insert([
//            'ime' => $request->name,
//            'prezime' => $request->last_name,
//            'profil_slika_urld' => $request->picture_url,
//            'broj_telefona' => $request->phone,
//            'email' => $request->email,
//            'viber_code' => $request->viber_code,
//            'viber_subscribe' => $request->viber_subscribe,
//            'opstina_id' => $request-> opstina_id
//        ]);
//
//        return $data;
//    }

    public function get($id)
    {
        $korisnici = korisnici::with('ime')->get()->find($id);
        return $korisnici;
    }


    public function show($id)
    {
        $data = korisnici::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $korisnici = \App\Models\korisnici::find($id);
        $korisnici->update($request->all()); //model update
        return $korisnici;
    }

    public function destroy($id)
    {
        $korisnici = korisnici::findOrFail($id);
        $korisnici->delete($id);
        return '{"success":"Uspjesno ste obrisali korisnika."}';
    }
}
