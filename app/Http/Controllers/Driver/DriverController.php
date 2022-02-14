<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class DriverController extends Controller
{
    private $management;

    public function __construct() {
        $this->management = new DriverDataManagement();
    }

    public function saveDriver(Request $request)
    {
        $data = $request->all();
        $this->management->setData($data);

        try {
            return response()
                ->json(['success' => true,
                    'results' => $this->management->saveDrive()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getDriver()
    {
        try {
            return response()
                ->json(['success' => true,
                    'data' => $this->management->getDataDrive()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
