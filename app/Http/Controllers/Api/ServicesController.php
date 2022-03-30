<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ServiceApi;

class ServicesController extends Controller
{
  private $apiService;

  public function __construct(ServiceApi $apiService)
  {
    $this->apiService = $apiService;
  }
  /**
   * Routes for get the token
   *
   * @return String
   */
  private function getToken(Request $request)
  {
    $post = $this->apiService->token();
    $request->session()->put('token', $post->access_token);
    return $post->access_token;
  }

  /**
   * Display a listing of the services.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    try {
      $token = $request->session()->get('token') ?? $this->getToken($request);
      $list = $this->apiService->list($token);
      if (isset($list->status_code) && $list->status_code == '401') {
        $token = $this->getToken($request);
        $list = $this->apiService->list($token);
      }
      return $this->responseOk($list);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }

  /**
   * Display detailed view of a service
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id, Request $request)
  {
    try {
      $token = $request->session()->get('token') ?? $this->getToken($request);
      $service = $this->apiService->findById($id, $token);
      if (isset($service->status_code) && $service->status_code == '401') {
        $token = $this->getToken($request);
        $service = $this->apiService->findById($id, $token);
      }
      return $this->responseOk($service);
    } catch (\Exception $error) {
      return $this->responseException($error);
    }
  }
}
