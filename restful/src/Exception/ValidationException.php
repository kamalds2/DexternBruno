<?php

namespace App\Exception;

use RuntimeException;
use Throwable;

final class ValidationException extends RuntimeException
{
  private $errors;

  public function __construct(
      string $message, 
      array $errors = [], 
      int $code
  ){
    parent::__construct($message, $code);

    $this->errors = $errors;
  }
  public function getErrors(): array
  {
    return $this->errors;
  }
}