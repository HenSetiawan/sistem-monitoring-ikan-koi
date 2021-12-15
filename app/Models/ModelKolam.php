<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKolam extends Model
{
    use HasFactory;
    protected $table = 'kolam';
    protected $fillable = ['nama','lokasi','umur'];

    public function sensor(){
        // having many kemajuans
        return $this->hasMany(ModelSensor::class, 'kolam_id', 'id');
    }
}
