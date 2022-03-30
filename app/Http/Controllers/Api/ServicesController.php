<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Service;

class ServicesController extends Controller
{

  /**
   * Routes for get the token
   *
   * @return String
   */
  private function getToken(Request $request, Service $apiService)
  {
    $post = $apiService->token();
    $request->session()->put('token', $post->access_token);
    return $post->access_token;
  }

  /**
   * Display a listing of the services.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Service $apiService)
  {
    try {
      $token = $request->session()->get('token') ?? $this->getToken($request, $apiService);
      $list = $apiService->list($token);
      if (isset($list->status_code) && $list->status_code == '401') {
        $token = $this->getToken($request, $apiService);
        $list = $apiService->list($token);
      }
      return $this->responseList($list);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }

  /**
   * Display detailed view of a service
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id, Request $request, Service $apiService)
  {
    try {
      $token = $request->session()->get('token') ?? $this->getToken($request, $apiService);
      $service = $apiService->findById($id, $token);
      if (isset($service->status_code) && $service->status_code == '401') {
        $token = $this->getToken($request, $apiService);
        $service = $apiService->findById($id, $token);
      }
      return $this->responseShow($service);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }
}
