<?php

namespace App\Http\Controllers\Vehicle;

use App\Models\Vehicle;

class VehicleDataManagement
{
    private $data;

    //funcion para setear la data proveniente del controlador
    public function setData($data)
    {
        $this->data = $data;
    }

    public function saveVehicle()
    {
        $data = [
            'license_plate' => $this->data['license_plate'],
            'color' => $this->data['color'],
            'type' => $this->data['type'],
            'driver_id' => intval($this->data['driver_id']),
            'owner_id' => intval($this->data['owner_id']),
            ];
        return Vehicle::saveVehicle($data);
    }

    public function getDataVehicle()
    {
        return Vehicle::getAll();
    }

    public function getReportByOwnerDriver()
    {
        return Vehicle::getReport();
    }


    
}