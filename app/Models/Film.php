<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = "id_film";

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }

    public function distributeur()
    {
        return $this->belongsTo(Distributeur::class, 'id_distributeur');
    }

    //public function image()
    //{
     //   return $this->hasOne(Image::class, 'id_img');
    //}



}
