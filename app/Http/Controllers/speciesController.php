<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Validator;


class speciesController extends Controller
{
    
public function newSpecie (Request $request)

{
    $validator = Validator::make($request->all(), [
        'image' => 'required|image|max:2048',
        'nombre' =>'required|string|max:50',
        'sexo' => 'required',
        'msnm' => 'required|numeric',
        'fotocolector' => 'required|string|max:50',
        'proyecto_id' => 'required',
        'laboratorio' => 'required',
        'responsable_de_montado' => 'required|string|max:50',
        'institucion_id' => 'required',
        'coleccion_id' => 'required',
        'municipio_id' => 'required',
        'region_id' => 'required',
        'clima_id' => 'required',
        'image' => 'required|image|max:2048',
    
    ]);
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $rutaArchivoImg = $request->file('image')->store('public/imgspecies');
    $specie = Species::create([
        'image' => $rutaArchivoImg,
        'nombre' => $request->nombre,
        'sexo' => $request->sexo,
        'msnm' => $request->msnm,
        'fotocolector' => $request->fotocolector,
        'laboratorio' => $request->laboratorio,
        'responsable_de_montado' => $request->responsable_de_montado,
        'proyecto_id' => $request->proyecto_id,
        'institucion_id' => $request->institucion_id,
        'coleccion_id' => $request->coleccion_id,
        'municipio_id' => $request->municipio_id,
        'region_id' => $request->region_id,
        'clima_id' => $request->clima_id,

    ]);
    return response()->json(['specie' => $specie], 201);
}

public function updateSpecieById(Request $request, $id)

    {
       $specie = Species::find($id);
         if(!$specie){
            return response()->jason(['message' => 'specie not found'], 404);
      }
        $validator = Validator::make($request->all(), [
           'nombre' =>'string|max:50',
           'sexo' => 'string',
           'msnm' => 'numeric',
           'fotocolector' => 'string',
           'responsable_de_montado' => 'string',
           'laboratorio' => 'string',
           'institucion_id' => 'numeric|nullable',
           'coleccion_id' => 'numeric|nullable',
           'proyecto_id' => 'numeric|nullable',
           'municipio_id' => 'numeric|nullable',
           'region_id' => 'numeric|nullable',
           'clima_id' => 'numeric|nullable',
      ]);
      if($validator->fails()){
        return response()->json(['errors' => $validator->errors()], 422);
      }

      if ($request->hasFile('image')) {
        // Si se envía una nueva imagen, se elimina la imagen anterior y se almacena la nueva.
        if ($specie->image) {
            Storage::delete($specie->image);
        }
        $rutaArchivoImg = $request->file('image')->store('public/imgspecies');
        $specie->image = $rutaArchivoImg;
    }
      $fieldsToUpdate = [
      'nombre',
      'sexo',
      'msnm',
      'fotocolector',
      'laboratorio',
      'responsable_de_montado',
      'proyecto_id',
      'institucion_id',
      'coleccion_id',
      'municipio_id',
      'region_id',
      'clima_id'
    ];
    foreach($fieldsToUpdate as $field){
        if($request->has($field)){
            $specie->$field = $request->input($field);
        }
    }
    $specie->save();
    return response()->json(['message' => 'Información de la especie actualiada correctamente'], 200);

 
}



public function getSpecies(){
    return response()->json(Species::all(), 200);
}

public function getSpeciesById($id){
    $specie = Species::find($id);
    if(is_null($specie)){
        return response()->json(['msn' => 'Specie not found'], 404);
    }
    return response()->json($specie, 200);
}




public function deleteSpeciesById($id){
    $specie = Species::find($id);
    if(is_null($specie)){
        return response()->json(['msn' => 'specie not found'], 404);
     }
     $specie->delete();
     return response()->json(['msn' => 'specie deleted'], 200);
}

}
