<?php

namespace App\Action\Jobs;

use App\Domain\Jobs\Jobs;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class DeleteJob
{
  private $pages;
  public function __construct(Jobs $pages)
  {
    $this->pages = $pages; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);

      $pages = $this->pages->deleteJob($data);
      $response->getBody()->write((string)json_encode($pages));
      return $response->withHeader('Content-Type','application/json');
    }
}