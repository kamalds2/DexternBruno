<?php

namespace App\Action\TravelBunny;

use App\Domain\TravelBunny\TravelBunny;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllFooterMenus
{

  private $travelbunny;
  public function __construct(TravelBunny $travelbunny)
  {
    $this->travelbunny = $travelbunny; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response ,$args
    ): ResponseInterface
    { 
       
      $travelbunny = $this->travelbunny->getAllFooterMenus($args);
      $response->getBody()->write((string)json_encode($travelbunny));
      return $response->withHeader('Content-Type','application/json');
    }
}