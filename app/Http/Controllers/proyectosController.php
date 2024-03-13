<?php

namespace App\Http\Controllers;


use App\Models\proyectos;
use Illuminate\Http\Request;

class proyectosController extends Controller

{

    public function newProyecto(Request $req){
        $proyecto = proyectos::create($req->all());
        return response($proyecto, 200);
    }
    public function getProyectos(){
        return response()->json(proyectos::all(), 200);
    }


    public function getProyectoById($id){
        $proyecto = proyectos::find($id);
        if(is_null($proyecto)){
            return response()->json(['msn' => 'proyecto not found'], 404);
        }
        return response()->json($proyecto, 200);
    
    }

    public function deleteProyectoById($id){
        $proyecto = proyectos::find($id);
        if(is_null($proyecto)){
            return response()->json(['msn' => ' proyecto not found'], 404);
        }
        $proyecto->delete();
        return response()->json(['msn' => 'proyecto deleted'], 200);
   }
    }