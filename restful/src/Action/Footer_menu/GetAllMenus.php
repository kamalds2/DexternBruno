<?php

namespace App\Action\Footer_menu;

use App\Domain\Footer_menu\Menus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllMenus
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
       
      $menus = $this->menus->getAllMenus($args);
      $response->getBody()->write((string)json_encode($menus));
      return $response->withHeader('Content-Type','application/json');
    }
}