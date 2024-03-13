<?php

namespace App\Http\Controllers;

use App\Models\municipio;
use Illuminate\Http\Request;

class municipioController extends Controller
{
    

    public function newMunicipio(Request $req){
        $municipio = municipio::create($req->all());
        return response($municipio, 200);
    }
    public function getMunicipio(){
        return response()->json(municipio::all(), 200);
    }


    public function getMunicipioById($id){
        $municipio = municipio::find($id);
        if(is_null($municipio)){
            return response()->json(['msn' => 'specie not found'], 404);
        }
        return response()->json($municipio, 200);
    
    }

    public function deleteMunicipioById($id){
        $municipio = municipio::find($id);
        if(is_null($municipio)){
            return response()->json(['msn' => ' municipio not found'], 404);
        }
        $municipio->delete();
        return response()->json(['msn' => 'municipio deleted'], 200);
   }
    }

