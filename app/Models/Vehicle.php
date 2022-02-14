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

    public static function getReport()
    {
        return Vehicle::select()
            ->select(
                'vehicles.license_plate', 
                'vehicles.type', 
                'owners.first_name as ownerName',
                'owners.last_name as ownerLastName',
                'owners.document as ownerDocument',
                'drivers.first_name as driverName',
                'drivers.last_name as driverLastName',
                'drivers.document as driverDocument'
            )
            ->join('owners', 'owners.id', '=', 'vehicles.owner_id' )
            ->join('drivers', 'drivers.id', '=', 'vehicles.driver_id')
            ->get();
    }
}
