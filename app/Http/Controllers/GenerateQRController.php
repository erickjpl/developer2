<?php

namespace App\Http\Controllers;

use App\Http\Services\Actions\GenerateQR;
use App\Http\Requests\GenerateQRRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use App\Http\Services\ApiCaller;
use App\Http\DomainError;
use Exception;

class GenerateQRController extends Controller
{
  public function __invoke(GenerateQRRequest $request)
  {
    $service = new ApiCaller(new GenerateQR($request));

    try {
      $response = $service->call($request);

      return new JsonResponse([
        'jsonapi' => [
          'version' => '1.0'
        ],
        'data' => $response['data'],
        'meta' => [
          'copyright' => "Copyright " . date('Y') . " " . config('app.name') . ". Todos los derechos reservados.",
          'message' => $response['message'],
          'status' => $response['state']
        ]
      ], 200);
    } catch (DomainError $e) {
      Log::error($e);
      return new JsonResponse([
        'jsonapi' => [
          'version' => '1.0'
        ],
        'error' => $e->getError(),
        'meta' => [
          'copyright' => "Copyright " . date('Y') . " " . config('app.name') . ". Todos los derechos reservados.",
          'message' => $e->getMessage(),
          'status' => $e->getStatus()
        ]
      ], $e->getCode() ?? 500);
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
