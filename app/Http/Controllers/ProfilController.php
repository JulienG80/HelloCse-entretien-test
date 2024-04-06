<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
class ProfilController extends Controller {
    public function create (Request $request) {
        $input = $request->all();
        new Profil($input['nom'],$input['prenom']);
        return response(200) ;
    }
}