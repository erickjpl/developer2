<?php

namespace Tests\UnitServices;

use App\Http\Services\ApiStrategy;
use App\Http\Services\ApiCaller;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;

class ApiCallerTest extends TestCase
{
  public function testApiCaller()
  {
    $apiStrategyMock = $this->createMock(ApiStrategy::class);
    $apiStrategyMock->method('execute')->willReturn(['data' => 'dummy data']);

    $apiCaller = new ApiCaller($apiStrategyMock);

    $request = new Request();

    $result = $apiCaller->call($request);

    $this->assertEquals(['data' => 'dummy data'], $result);
  }
}
