<?php

namespace App\Http\Services;

use \Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;

trait ApiCallerExceptionTrait
{
  function validate($response): array
  {
    if ($response->successful()) {
      return $this->validateState($response);
    }

    $response->throw();
  }

  function validateState($response): array
  {
    $res = $response->json();

    if ($res['state'] === Response::HTTP_OK) {
      return $res;
    }

    throw new ApiCallerException($res['data'], $res['state'], $res['message']);
  }

  function call(string $uri, array $body): ClientResponse {
    return Http::withHeaders([
      'Accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Authorization' => 'Bearer ' . config('developer2.api_key')
    ])->post(config('developer2.api_base_url') . config('developer2.api_public_uri') . $uri, $body);
  }
}
