<?php

namespace App\Action\Users;

use App\Domain\Users\Users;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetUserDetails
{
  private $users;
  public function __construct(Users $users)
  {
    $this->users = $users; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response, $args
    ): ResponseInterface
    {
      
      $users = $this->users->getUserDetails($args);
      $response->getBody()->write((string)json_encode($users));
      return $response->withHeader('Content-Type','application/json');
    }
}