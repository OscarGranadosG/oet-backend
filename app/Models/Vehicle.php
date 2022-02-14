<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'vehicles';

    protected $fillable = [
        'license_plate',
        'color',
        'type',
        'driver_id',
        'owner_id',
    ];

    public  function saveVehicle($data)
    {
        return Vehicle::create($data);
    }

    public static function getAll()
    {
        return Vehicle::select()->get();
    }

    public function owner()
    {
        return $this->belongsToMany('App\Models\Owner');
    }

    public function driver()
    {
        return $this->belongsToMany('App\Models\Driver');
    }
}
