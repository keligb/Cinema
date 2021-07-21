<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;
    protected $primaryKey = "id_film";

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }

     public function distributeur()
    {
        return $this->belongsTo(Distributeur::class, 'id_distributeur');
    }
}
