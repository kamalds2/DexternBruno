<?php

namespace App\Action\Pages;

use App\Domain\Pages\Pages;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllPages
{
  private $pages;
  public function __construct(Pages $pages)
  {
    $this->pages = $pages; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    {
      
      $pages = $this->pages->getAllPages($args);
      $response->getBody()->write((string)json_encode($pages));
      return $response->withHeader('Content-Type','application/json');
    }
}