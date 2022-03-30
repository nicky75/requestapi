<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Service implements ServiceApi
{

  /**
   * Gets the token
   *
   * @return \Illuminate\Http\Response
   */
  public function token()
  {
    $request = Http::post(env('API_ENDPOINT') . 'oauth2/access-token', [
      'grant_type' => env('API_GRANT_TYPE'),
      'client_id' => env('API_CLIENT_ID'),
      'client_secret' => env('API_CLIENT_SECRET')
    ]);

    $response = json_decode($request->getBody()->getContents());
    return $response;
  }

  /**
   * Gets list services
   *
   * @return \Illuminate\Http\Response
   */
  public function list($token)
  {
    $request = Http::withHeaders([
      'Accept' => 'application/vnd.cloudlx.v1+json',
      'Authorization' => 'Bearer ' . $token
    ])->get(env('API_ENDPOINT') . 'services');

    $response = json_decode($request->getBody()->getContents());
    return $response;
  }

  /**
   * View service by ID
   *
   * @return \Illuminate\Http\Response
   */
  public function findById($id, $token)
  {
    $request = Http::withHeaders([
      'Accept' => 'application/vnd.cloudlx.v1+json',
      'Authorization' => 'Bearer ' . $token
    ])->get(env('API_ENDPOINT') . 'services/' . $id . '/service');

    $response = json_decode($request->getBody()->getContents());

    return $response;
  }
}
