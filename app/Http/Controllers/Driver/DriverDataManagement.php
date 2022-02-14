<?php

namespace App\Http\Controllers\Driver;

use App\Models\Driver;

class DriverDataManagement
{
    private $data;

    //funcion para setear la data proveniente del controlador
    public function setData($data)
    {
        $this->data = $data;
    }

    public function saveDrive()
    {
        $data = [
            'document' => $this->data['document'],
            'first_name' => $this->data['first_name'],
            'second_name' => $this->data['second_name'],
            'last_name' => $this->data['last_name'],
            'address' => $this->data['address'],
            'phone' => $this->data['phone'],
            'city' => $this->data['city']
        ];
        return Driver::saveDriver($data);
    }

    public function getDataDrive()
    {
        return Driver::getAll();
    }


    
}