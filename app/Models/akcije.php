<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akcije extends Model
{
    use HasFactory;

    public  $table = 'akcije';

    public  $timestamps = false;

    protected $fillable = [
        'naslov', 'akcija_slika_url', 'opis', 'nudi', 'organizator_id', 'kontakt'
        , 'vrijeme_pocetka', 'mjesto', 'latitude', 'longitude', 'opstina_id', 'kategorija_id'
    ];


    public function opstina(){
        return $this->hasMany(opstine::class);
    }
    public function kategorija(){
        return $this->hasMany(kategorije::class);
    }
}
