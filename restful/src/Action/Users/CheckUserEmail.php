<?php

namespace App\Action\Users;

use App\Domain\Users\Users;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CheckUserEmail
{
  private $email;
  public function __construct(Users $email)
  {
    $this->email = $email; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response, $args
    ): ResponseInterface
    {
      
      $email = $this->email->checkUserEmail($args);
      $response->getBody()->write((string)json_encode($email));
      return $response->withHeader('Content-Type','application/json');
    }
}