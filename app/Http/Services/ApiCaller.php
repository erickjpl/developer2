<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

final class ApiCaller
{
  public function __construct(private ApiStrategy $strategy)
  {
  }

  public function call(Request $request)
  {
    return $this->strategy->execute($request);
  }
}
