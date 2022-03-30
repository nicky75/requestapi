<?php

namespace Tests\Unit;

use App\Services\Service;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    private function getToken(Service $apiService)
    {
      $post = $apiService->token();
      return $post->access_token;
    }
    
    /**
     * Service test for main components
     *
     * @return void
     */
    public function testServiceTest()
    {
        $apiService = new Service;

        $token = $this->getToken($apiService);
        $this->assertTrue(isset($token) && is_string($token));
        $list = $apiService->list($token);
        $this->assertTrue(count($list->services) > 0);
    }
}
