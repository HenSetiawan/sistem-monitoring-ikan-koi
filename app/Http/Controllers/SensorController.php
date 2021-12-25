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

  

    public function delete($id){
        try {
            ModelKolam::find($id)->delete();
            return redirect("/sensor/".$id);
        } catch (\Throwable $th) {
            
        }
    }

    public function showSensor($id){
        return view('pages/sensor',["id"=>$id]);
    }

    public function getSensor($id){
        $dataKolam = ModelKolam::find($id);
        if($dataKolam==!null){
            $sensor=$dataKolam->sensor;
           

            $suhu=[];
            $ph=[];

            for ($i=0; $i<count($sensor); $i++) { 
                array_push($ph,$sensor[$i]->ph);
                array_push($suhu,$sensor[$i]->suhu);
            }

            $averageSuhu;
            $averagePh;
            $createdTime=0;

            if(!empty($suhu && !empty($ph))){
               $averagePh = round(array_sum($suhu)/count($suhu));
               $averageSuhu = round(array_sum($ph)/count($ph));
            }else{
                $averageSuhu=0;
                $averagePh=0;
            }

            if(!empty($sensor[0])){
                $createdTime=date_format($sensor[0]->created_at,'H:i:s');
                
            }

            $result;
            // check kondisi ph
            if($averagePh >= 6 && $averagePh <=8){
                // check kondisi suhu
                if($averageSuhu>=21 && $averageSuhu <=29){
                    $result="Optimal";
                }else if($averageSuhu >=30){
                    // check umur ikan
                    if($dataKolam->umur>=1 && $dataKolam->umur<=6){
                        $result="Optimal"; 
                    }else if($dataKolam->umur >=6 && $dataKolam->umur<=36){
                        $result="Optimal"; 
                    }else{
                        $result="Tidak Optimal";
                    }
                }
                else{
                    $result="Tidak Optimal";
                }
            }else{
                $result="Tidak Optimal";
            }
            
            $data=[
                "ph"=>$ph,
                "suhu"=>$suhu,
                "averagePh"=>$averagePh,
                "averageSuhu"=>$averageSuhu,
                'umurIkan' => $dataKolam->umur,
                "created"=>$createdTime,
                "result"=>$result
            ];

            return response()->json($data);

        }else{
            return redirect("/");
            
        }
    }
}
