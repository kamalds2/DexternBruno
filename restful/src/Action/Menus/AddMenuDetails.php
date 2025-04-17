<?php

namespace App\Action\Menus;

use App\Domain\Menus\Menus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddMenuDetails
{
  private $menus;
  public function __construct(Menus $menus)
  {
    $this->menus = $menus; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response,$args
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);  
      $menus = $this->menus->addMenuDetails($data);
      $response->getBody()->write((string)json_encode($menus));
      return $response->withHeader('Content-Type','application/json');
    }
}