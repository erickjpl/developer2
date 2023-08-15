<?php

namespace Tests\UnitServices\Actions;

use App\Http\Services\Actions\GenerateQR;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;

class GenerateQRTest extends TestCase
{
  public function testParseBody()
  {
    $request = new Request([
      'phone' => '+58 (424) 214-77-13',
      'quantity' => 5,
    ]);

    $generateQR = new GenerateQR();
    $result = $generateQR->parseBody($request);

    $this->assertEquals([
      'cantidad' => 5,
      'numeroautorizacion' => '7713',
    ], $result);
  }
}
