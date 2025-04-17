<?php

namespace App\Action\TravelBunny;

use App\Domain\TravelBunny\TravelBunny;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllJobDetails
{

  private $travelbunny;
  public function __construct(TravelBunny $travelbunny)
  {
    $this->travelbunny = $travelbunny; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response , $args
    ): ResponseInterface
    { 
       $data = $request->getParsedBody();
      $travelbunny = $this->travelbunny->getAllJobDetails($data);
      $response->getBody()->write((string)json_encode($travelbunny));
      return $response->withHeader('Content-Type','application/json');
    }
}