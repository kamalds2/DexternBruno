<?php

namespace App\Action\Roles;

use App\Domain\Roles\Roles;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddRole
{
  private $roles;
  public function __construct(Roles $roles)
  {
    $this->roles = $roles; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);
      // print_r($data);die(); 
      $roles = $this->roles->addRole($data);
      $response->getBody()->write((string)json_encode($roles));
      return $response->withHeader('Content-Type','application/json');
    }
}