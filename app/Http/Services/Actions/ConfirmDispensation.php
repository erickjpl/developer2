<?php

namespace App\Http\Services\Actions;

use App\Http\Services\ApiCallerExceptionTrait;
use App\Http\Services\ApiStrategy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

final class ConfirmDispensation implements ApiStrategy
{
  use ApiCallerExceptionTrait;

  function execute(Request $request): array
  {
    $uri = $this->parseUri();

    $body = $this->parseBody($request);

    $response = $this->call($uri, $body);

    return $this->validate($response);
  }

  function parseUri(): string {
    $codeMachine = config('developer2.code_machine');

    return Str::replace('{code_machine}', $codeMachine, config('developer2.uri_confirm_dispensation'));
  }

  function parseBody(Request $request): array {
    return [
      'billetesm1' => $request->get('billetesm1'),
      'billetesm2' => $request->get('billetesm2'),
      'codigo' => $request->get('codigo')
    ];
  }
}
