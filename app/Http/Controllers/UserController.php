<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seances;
use App\Models\Films;
use App\Models\Salles;

class UserController extends Controller{

    function unefonction(){
        return view('mes-seances');
    }

    function listUserSeances(){
        $seance_list = Seances::paginate(5);

        return view('mes-seances', ['seance_list' => $seance_list]);
    }

}
