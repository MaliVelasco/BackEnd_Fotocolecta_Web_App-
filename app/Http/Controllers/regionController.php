<?php



namespace App\Http\Controllers;
use App\Models\region;
use Illuminate\Http\Request;

class regionController extends Controller
{
//
public function newRegion(Request $req){
    $region = region::create($req->all());
    return response($region, 200);
}

public function getRegion(){
    return  response()->json(region::all(), 200);
}


/////////////////////
public function getRegionById($id){
    $region = region::find($id);
    if(is_null($region)){
        return response()->json(['msn' => 'region not found'], 404);
    }
    return response()->json($region, 200);
}
////////////////////

public function deleteRegionById($id){
    $region = region::find($id);
    if(is_null($region)){
        return response()->json(['msn' => 'region not found'], 404);
    }
    $region->delete();
    return response()->json($region, 200);
}
}
