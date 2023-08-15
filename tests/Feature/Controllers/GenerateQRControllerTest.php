<?php

namespace Tests\Feature\Controllers;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class GenerateQRControllerTest extends TestCase
{

  public function testGenerateQRController()
  {
    Config::set('app.name', 'API RapidPrest');

    $data = [
      'name' => 'Erick Perez',
      'quantity' => 5,
      'phone' => '+58 (424) 214-77-13'
    ];
    $response = $this->json('POST', '/api/generate-qr', $data);

    $response->assertStatus(200);

    $response->assertJson([
      'jsonapi' => [
        'version' => '1.0',
      ],
      'meta' => [
        'copyright' => 'Copyright ' . date('Y') . ' ' . config('app.name') . '. Todos los derechos reservados.',
        'message' => 'Consulta Correcta',
        'status' => 200,
      ],
    ]);

    $response->assertJsonStructure([
      'data' => [
        'codigo',
      ],
    ]);
  }

  public function testGenerateQRControllerWithoutParameters()
  {
    $response = $this->json('POST', '/api/generate-qr', []);

    $response->assertStatus(422);

    $response->assertJsonStructure([
      'message',
      'errors'
    ]);

    $response->assertJson([
      'message' => 'The name field is required. (and 2 more errors)',
      'errors' => [
        'name' => [
          'The name field is required.'
        ],
        'quantity' => [
          'The quantity field is required.'
        ],
        'phone' => [
          'The phone field is required.'
        ]
      ]
    ]);
  }
}
