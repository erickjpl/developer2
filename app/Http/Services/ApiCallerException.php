<?php

namespace App\Http\Services;

use App\Http\DomainError;

class ApiCallerException extends DomainError
{
  private string $status;
  private string $data;

  public function __construct($data, string $status, string $message)
  {
    $this->status = $status;
    $this->data = $data;

    parent::__construct($message, $this->code());
  }

  public function status(): string
  {
    return $this->status;
  }

  public function data(): string
  {
    return $this->data;
  }

  public function code(): int
  {
    return 400;
  }
}
