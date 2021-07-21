<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_seances extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $tableName = "user_has_seances";
    
    public function list_data(){
        return $this->belongsTo(Seances::class, 'id_seance');
    }

    public function list_film(){
        return $this->belongsTo(Films::class, 'id_film');
    }

    public function list_user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}

