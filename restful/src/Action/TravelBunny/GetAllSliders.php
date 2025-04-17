<?php

namespace App\Action\TravelBunny;

use App\Domain\TravelBunny\TravelBunny;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetAllSliders
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
       
      $travelbunny = $this->travelbunny->getAllSliders($args);
      $response->getBody()->write((string)json_encode($travelbunny));
      return $response->withHeader('Content-Type','application/json');
    }
    public function fetchSliderDetails(
      ServerRequestInterface $request, 
      ResponseInterface $response,$args
    ): ResponseInterface
    {
       
      $sliders = $this->sliders->getSliderDetails($args);
      $response->getBody()->write((string)json_encode($sliders));
      return $response->withHeader('Content-Type','application/json');
    }
}