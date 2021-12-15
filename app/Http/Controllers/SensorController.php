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
        
        $validated = $request->validate([
            "suhu" => ["required"],
            "ph" => ["required"],
        ]);

        $validated['kolam_id']=$idLatestKolam;
       
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
            $createdTime=[];

           

            for ($i=0; $i<count($sensor); $i++) { 
                array_push($suhu,$sensor[$i]->suhu);
                array_push($ph,$sensor[$i]->ph);
                array_push($createdTime,$sensor[$i]->created_at);
            }

            $data=[
                "suhu"=>json_encode($suhu,JSON_NUMERIC_CHECK),
                "ph"=>json_encode($ph,JSON_NUMERIC_CHECK),
            ];

            $averageSuhu=array_sum($suhu)/count($suhu);
            $averagePh=array_sum($ph)/count($ph);

            return view('pages/blank',["sensor"=>$sensor,"averageSuhu"=>$averageSuhu,"averagePh"=>$averagePh,"data"=>$data]);
        }else{
            $allKolam = ModelKolam::all();
            return view('pages/proses',["data"=>$allKolam]);
            
        }
    }
}
