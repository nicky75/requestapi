<?php
namespace App\Services;

interface ServiceApi {
    public function token();
    public function list($token);
    public function findById($id, $token);
}