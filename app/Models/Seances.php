<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seances extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public function film(){
        return $this->belongsTo(Films::class, 'id_film');
    }

    public function salle(){
        return $this->belongsTo(Salles::class, 'id_salle');
    }

}
