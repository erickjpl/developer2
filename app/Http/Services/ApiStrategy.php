<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface ApiStrategy
{
  public function execute(Request $request): array;
}
