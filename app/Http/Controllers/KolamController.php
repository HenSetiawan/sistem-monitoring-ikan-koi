<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\ModelKolam;

class KolamController extends Controller
{
    public function addNewKolam(Request $request){
        $validated = $request->validate([
            "nama" => ["required"],
            "lokasi" => ["required"],
            "umur" => ["required"],
        ]);

        try {
            $kolam = ModelKolam::create($validated);
        } catch (QueryException $err) {
            dd($err->errorInfo);
        }

       
    }
}
