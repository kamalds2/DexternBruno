<?php

namespace App\Action\Jobs;

use App\Domain\Jobs\Jobs;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddJob
{
  private $jobss;
  public function __construct(Jobs $jobs)
  {
    $this->jobs = $jobs; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);
      // print_r($data);die(); 
      $jobs = $this->jobs->addJob($data);
      $response->getBody()->write((string)json_encode($jobs));
      return $response->withHeader('Content-Type','application/json');
    }
}