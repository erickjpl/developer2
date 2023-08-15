<?php

namespace App\Http;

use DomainException;

abstract class DomainError extends DomainException
{
  private string $status;
  private string $data;

  public function __construct(string $message, string $code)
  {
    $this->status = $this->status();
    $this->data = $this->data();

    parent::__construct($message, $code);
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  public function getError()
  {
    return $this->data;
  }

  abstract public function status(): string;
  abstract public function data(): string;
  abstract public function code(): int;
}
