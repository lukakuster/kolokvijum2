<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opstine extends Model
{
    use HasFactory;

    public  $table = 'opstine';

    public  $timestamps = false;

    protected $fillable = [
        'naziv'
    ];


    public function akcije(){
        return $this->belongsTo(akcije::class);
    }
    public function korisnici(){
        return $this->belongsTo(korisnici::class);
    }
}
