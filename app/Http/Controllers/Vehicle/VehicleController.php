<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class VehicleController extends Controller
{
    private $management;

    public function __construct() {
        $this->management = new VehicleDataManagement();
    }

    public function saveVehicle(Request $request)
    {
        $data = $request->all();
        $this->management->setData($data);

        try {
            return response()
                ->json(['success' => true,
                    'results' => $this->management->saveVehicle()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getVehicle()
    {
        try {
            return response()
                ->json(['success' => true,
                    'data' => $this->management->getDataVehicle()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
