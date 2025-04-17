<?php

namespace App\Action\Roles;

use App\Domain\Roles\Roles;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetRoles
{
  private $roles;
  public function __construct(Roles $roles)
  {
    $this->roles = $roles; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response,$args
    ): ResponseInterface
    {
        
      $roles = $this->roles->getRoles($args);
      $response->getBody()->write((string)json_encode($roles));
      return $response->withHeader('Content-Type','application/json');
    }
}