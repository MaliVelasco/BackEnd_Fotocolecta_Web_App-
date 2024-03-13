<?php

namespace App\Http\Controllers;

use App\Models\clima;
use Illuminate\Http\Request;

class climaController extends Controller
{
    //
    public function newClima(Request $req){
        $clima = clima::create($req->all());
        return response($clima, 200);
    }
    
public function getClima(){
    return  response()->json(clima::all(), 200);
}

public function getClimaById($id){
    $clima = clima::find($id);
    if(is_null($clima)){
        return response()->json(['msn' => 'clima not found'], 404);
    }
    return response()->json($clima, 200);
    

}

public function deleteClimaById($id){
    $clima = clima::find($id);
    if(is_null($clima)){
        return response()->json(['msn' => 'clima not found'], 404);
    }
    $clima->delete();
     return response()->json(['msn' => 'clima  deleted'], 200);
}





}
