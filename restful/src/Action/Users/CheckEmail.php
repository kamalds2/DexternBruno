<?php

namespace App\Action\Users;

use App\Domain\Users\Users;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CheckEmail
{
  private $users;
  public function __construct(Users $users)
  {
    $this->users = $users; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);
      // print_r($data);die(); 
      $users = $this->users->checkEmail($data);
      $response->getBody()->write((string)json_encode($users));
      return $response->withHeader('Content-Type','application/json');
    }
}