<?php

namespace App\Action\Sliders;

use App\Domain\Sliders\Sliders;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetSliderDetails
{
  private $sliders;
  public function __construct(Sliders $sliders)
  {
    $this->sliders = $sliders; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response,$args
    ): ResponseInterface
    {
       
      $sliders = $this->sliders->getSliderDetails($args);
      $response->getBody()->write((string)json_encode($sliders));
      return $response->withHeader('Content-Type','application/json');
    }
}