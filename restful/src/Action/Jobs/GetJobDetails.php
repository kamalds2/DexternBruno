<?php

namespace App\Action\Jobs;

use App\Domain\Jobs\Jobs;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetJobDetails
{
  private $pages;
  public function __construct(Jobs $pages)
  {
    $this->pages = $pages; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    {
      
      $pages = $this->pages->getJobDetails($args);
      $response->getBody()->write((string)json_encode($pages));
      return $response->withHeader('Content-Type','application/json');
    }
}