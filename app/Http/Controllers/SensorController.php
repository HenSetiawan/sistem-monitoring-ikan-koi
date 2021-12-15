<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKolam;
use App\Models\ModelSensor;

class SensorController extends Controller
{
    public function store(Request $request){
        $latestKolam = ModelKolam::latest()->first();
        $idLatestKolam = $latestKolam->id;
        $dataKolam = ModelKolam::find($idLatestKolam);

        $sensor=$dataKolam->sensor;
        
        $validated = $request->validate([
            "suhu" => ["required"],
            "ph" => ["required"],
        ]);

        $validated['kolam_id']=$idLatestKolam;


        if(count($sensor)==6){
            return response()->json([
                'message' => 'failed, data was full'
            ]);  
        }
       
        try {
            $sensor = ModelSensor::create($validated);
            return response()->json([
                'message' => 'success',
                'data' => $sensor
            ]);
        } catch (QueryException $err) {
            dd($err->errorInfo);
        }
    }

    public function showSensor($idKolam){
        $dataKolam = ModelKolam::find($idKolam);
        if($dataKolam==!null){
            $sensor=$dataKolam->sensor;

            $suhu=[];
            $ph=[];

            if(count($sensor)<6){
                for ($i=0;$i<6;$i++){
                    array_push($suhu,0);
                    array_push($ph,0);
                }

                $createdTime="0000-00-00 00:00:00";
                
            }else{
                for ($i=0; $i<6; $i++) { 
                    array_push($suhu,$sensor[$i]->suhu);
                    array_push($ph,$sensor[$i]->ph);
                }
                $createdTime=$sensor[0]->created_at;
            }
 
            $data=[
                "suhu"=>json_encode($suhu,JSON_NUMERIC_CHECK),
                "ph"=>json_encode($ph,JSON_NUMERIC_CHECK),
            ];

            $averageSuhu=array_sum($suhu)/count($suhu);
            $averagePh=array_sum($ph)/count($ph);

            return view('pages/blank',["time"=>$createdTime,"averageSuhu"=>$averageSuhu,"averagePh"=>$averagePh,"data"=>$data]);
        }else{
            return redirect("/kolam");
            
        }
    }
}
