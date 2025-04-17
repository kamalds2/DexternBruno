<?php

namespace App\Action\Sliders;

use App\Domain\Sliders\Sliders;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddSlider
{
  private $sliders;
  public function __construct(Sliders $sliders)
  {
    $this->sliders = $sliders; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);
      // print_r($data);die(); 
      $sliders = $this->sliders->addSlider($data);
      $response->getBody()->write((string)json_encode($sliders));
      return $response->withHeader('Content-Type','application/json');
    }
}