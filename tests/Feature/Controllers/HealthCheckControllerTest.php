<?php

namespace Tests\FeatureControllers;

use Tests\TestCase;

class HealthCheckControllerTest extends TestCase
{
  public function testHealthCheckEndpoint()
  {
    $response = $this->get('/api/health-check');

    $response->assertStatus(200)
      ->assertJson([
        'jsonapi' => [
          'version' => '1.0',
        ],
        'meta' => [
          'copyright' => "Copyright " . date('Y') . " " . config('app.name') . ". Todos los derechos reservados.",
          'message' => 'La API está activa.',
          'status' => '200',
        ],
      ]);
  }
}
