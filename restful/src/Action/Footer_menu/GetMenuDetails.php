<?php

namespace App\Action\Footer_menu;

use App\Domain\Footer_menu\Menus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetMenuDetails
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
       
      $menus = $this->menus->getMenuDetails($args);
      $response->getBody()->write((string)json_encode($menus));
      return $response->withHeader('Content-Type','application/json');
    }
}