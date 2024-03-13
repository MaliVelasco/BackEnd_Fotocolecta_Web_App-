<?php

namespace App\Http\Controllers;


use App\Models\instituciones;
use Illuminate\Http\Request;

class institucionesController extends Controller
{
    

    public function newInstitucion(Request $req){
        $institucion = instituciones::create($req->all());
        return response($institucion, 200);
    }
    public function getInstituciones(){
        return response()->json(instituciones::all(), 200);
    }


    public function getInstitucionById($id){
        $institucion = instituciones::find($id);
        if(is_null($institucion)){
            return response()->json(['msn' => 'institucion not found'], 404);
        }
        return response()->json($institucion, 200);
    
    }

    public function deleteInstitucionById($id){
        $institucion = instituciones::find($id);
        if(is_null($institucion)){
            return response()->json(['msn' => ' institucion not found'], 404);
        }
        $institucion->delete();
        return response()->json(['msn' => 'institucion deleted'], 200);
   }
    }
