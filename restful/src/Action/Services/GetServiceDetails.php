<?php

namespace App\Action\Services;

use App\Domain\Services\Services;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetServiceDetails
{
  private $pages;
  public function __construct(Services $pages)
  {
    $this->pages = $pages; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    {
      
      $pages = $this->pages->getPageDetails($args);
      $response->getBody()->write((string)json_encode($pages));
      return $response->withHeader('Content-Type','application/json');
    }
}