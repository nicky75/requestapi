<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseError($resp)
    {
        return view('layouts.errors', ['errors' => [$resp->getMessage()]]);
    }

    public function responseShow($service)
    {
        return view('services.show', ['service' => $service]);
    }

    public function responseList($list)
    {
        return view('services.index', ['services' => $list->services]);
    }

    public function responseOk($resp)
    {
        return response()->json($resp, 200);
    }

    public function responseException($resp)
    {
        return response()->json(['message' => $resp->getMessage(), 'trace' => $resp->getTraceAsString()], 500);
    }
}
