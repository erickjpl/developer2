<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Exception;

class HealthCheckController extends Controller
{
  public function __invoke()
  {
    try {
      return new JsonResponse([
        'jsonapi' => [
          'version' => '1.0'
        ],
        'meta' => [
          'copyright' => "Copyright " . date('Y') . " " . config('app.name') . ". Todos los derechos reservados.",
          'message' => 'La API está activa.',
          'status' => '200'
        ]
      ], 200);
    } catch (Exception $e) {
      Log::error($e);
      return new JsonResponse([
        'jsonapi' => [
          'version' => '1.0'
        ],
        'error' => $e->getMessage(),
        'meta' => [
          'copyright' => "Copyright " . date('Y') . " " . config('app.name') . ". Todos los derechos reservados.",
          'message' => 'Ha ocurrido un error inesperado..!'
        ]
      ], $e->getCode() ?? 500);
    }
  }
}
