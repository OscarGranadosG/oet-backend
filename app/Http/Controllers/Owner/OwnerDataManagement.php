<?php

namespace App\Http\Controllers\Owner;

use App\Models\Owner;

class OwnerDataManagement
{
    private $data;

    //funcion para setear la data proveniente del controlador
    public function setData($data)
    {
        $this->data = $data;
    }

    public function saveOwner()
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
        return Owner::saveOwner($data);
    }

    public function getDataOwner()
    {
        return Owner::getAll();
    }


    
}