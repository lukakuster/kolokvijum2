<?php

namespace App\Http\Controllers;

use App\Models\akcije;
use Illuminate\Http\Request;

class akcijeController extends Controller
{
    public function index()
    {
        $data = \App\Models\akcije::all();
        return $data;
    }

    public function store(Request $request)
    {
        $data = \App\Models\akcije::create($request->all());
        return $data;
    }


    public function get($id)
    {
        $akcije = akcije::with('naslov')->get()->find($id);
        return $akcije;
    }


    public function show($id)
    {
        $data = akcije::findOrFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $akcije = \App\Models\akcije::find($id);
        $akcije->update($request->all()); //model update
        return $akcije;
    }

    public function destroy($id)
    {
        $akcije = akcije::findOrFail($id);
        $akcije->delete($id);
        return '{"success":"Uspjesno ste obrisali korisnika."}';
    }

    public function getAkcijeWithKorisniciAndOpstine($id)
    {

        $dataNativ = \DB::select(\DB::raw("SELECT akcija.id, naslov, akcija_slika_url,
        opis, organizator.id as organizator_id, kontakt, vrijeme_pocetka, mjesto, latitude, longitute
        opstina.id as opstina_id, kategorija.id as kategorija_id, FROM akcije
        JOIN kategorija on (kategorija.id = akcija.kategorija_id)
        JOIN opstine on (opstine.id = akcija.opstina_id)
        WHERE akcija.id = " .$id.' ;'));

        return $dataNativ;
    }

    public function getAkcijeModelsByKorisniciFromOpstine($id)
    {
        $data = \DB::select(\DB::raw("SELECT akcija.id as akcija_id, korisnik.id as korisnik_id, akcija.opstina.id as opstina_id FROM korisnici_akcije, akcije
        JOIN opstina on (akcija.opstina.id = akcija.opstina_id)
        JOIN korisnik on (korisnik.id = akcija.korisnik_id)
        WHERE akcija.id = " .$id.' ;'));

        return $data;
    }
}
