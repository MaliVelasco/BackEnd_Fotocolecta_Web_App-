<?php

namespace App\Http\Controllers;


use App\Models\colecciones;
use Illuminate\Http\Request;

class coleccionesController extends Controller
{
    //

    public function newColeccion(Request $req){
        $coleccion = colecciones::create($req->all());
        return response($coleccion, 200); 
    }

    public function getColecciones(){
        return response()->json(colecciones::all(), 200);
    }

    public function getColeccionById($id){
        $coleccion = colecciones::find($id);
        if(is_null($coleccion)){
            return response()->json(['msn' => 'coleccion not found'], 404);
        }
        return response()->json($coleccion, 200);
    
    }

    public function deleteColeccionById($id){
        $coleccion = colecciones::find($id);
        if(is_null($coleccion)){
            return response()->json(['msn' => ' coleccion not found'], 404);
        }
        $coleccion->delete();
        return response()->json(['msn' => 'Coleccion deleted'], 200);
   }
}
