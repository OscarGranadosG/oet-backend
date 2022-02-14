<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class OwnerController extends Controller
{
    private $management;

    public function __construct() {
        $this->management = new OwnerDataManagement();
    }

    public function saveOwner(Request $request)
    {
        $data = $request->all();
        $this->management->setData($data);

        try {
            return response()
                ->json(['success' => true,
                    'results' => $this->management->saveOwner()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getOwner()
    {
        try {
            return response()
                ->json(['success' => true,
                    'data' => $this->management->getDataOwner()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            return response()
                ->json(['success' => false,
                    'error' => $e->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
