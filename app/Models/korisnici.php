<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class korisnici extends Model
{
    use HasFactory;

    public  $table = 'korisnici';

    public  $timestamps = false;

    protected $fillable = [
        'ime', 'prezime', 'profil_slika_url', 'broj_telefona', 'email', 'viber_code'
        , 'viber_id', 'viber_subsrcibe', 'opstina_id'
    ];


    public function opstina(){
        return $this->hasMany(opstine::class);
    }
}
