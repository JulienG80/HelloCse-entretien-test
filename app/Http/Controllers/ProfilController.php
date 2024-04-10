<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Rules\Image64RequestRule;
class ProfilController extends Controller {

    public function create (Request $request):Response {        
        
        $request->validate([
            'nom' => 'bail|required|max:255',
            'prenom' => 'required|max:255',
        ]);

        $input = $request->all();
        $input['statut']="EN_ATTENTE";
        $profil = new Profil($input);

        if ($profil->save()) {
            return response(200);
        } else {
            return response(400);
        }
    }

    public function update (Request $request,int $id) {

        $request->validate([
            'nom' => 'bail|max:255',
            'prenom' => 'max:255',
            'image' => new Image64RequestRule,
        ]);

        if($profil = $this->getOneById($id)) {
            $input = $request->all();
            foreach ($input as $key => $value) {                
                if( method_exists($profil, 'set'.Str::studly($key))) {
                    $profil->setAttribute($key, $value);
                }
            }
            $profil->save();     
        }
        return response(200) ;
    }
    public function delete (Request $request,int $id) {
        if($profil = $this->getOneById($id)) {
            $profil->delete();
        }
        return response(200) ;
    }
    public function addCommente (Request $request,$id) {
        $request->merge(['idProfil' => $id]);


        $validated = $request->validate([
            'idCreateur' => 'required',
            'idProfil' => 'required',
            'contenu' => 'required|string',
        ]);
        $request->merge(['idAdministrateur' => $validated['idCreateur']]);
        
        if(Profil::where ('id', $validated['idProfil'])->count('id')) {
            $request->merge(['timeCommentaire' => now()]);
            $input = $request->all();
            $commentaire = new Commentaire($input);
            if ($commentaire->save()) {
                return response(200);
            } else {
                return response(400);
            }
        }
        return response(400) ;
    }
    public function getAll (Request $request) {       
        $input = $request->all();
        if(isset($input['idCreateur'])) { //Cas d'un utilisateur authentifié 
            return response()->json(Profil::where('statut', 'ACTIF')->get()->makeVisible('statut')->toArray());
        } else {
            return response()->json(Profil::where('statut', 'ACTIF')->get()->toArray());
        }
    }
    public function getOneById (int $id) {
        return Profil::where('id', $id)->first();
    }
}