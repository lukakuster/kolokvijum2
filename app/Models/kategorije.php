<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorije extends Model
{
    use HasFactory;

    public  $table = 'kategorije';

    public  $timestamps = false;

    protected $fillable = [
        'naziv'
    ];


    public function akcije(){
        return $this->belongsTo(akcije::class);
    }

}
