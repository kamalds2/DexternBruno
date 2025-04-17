<?php

namespace App\Action\Testimonials;

use App\Domain\Testimonials\Testimonials;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AddTestimonialDetails
{
  private $testimonials;
  public function __construct(Testimonials $testimonials)
  {
    $this->testimonials = $testimonials; 
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response,$args
    ): ResponseInterface
    {
      $data = $request->getBody();
      $data =(array) json_decode($data);
      $testimonials = $this->testimonials->addTestimonialDetails($data);
      $response->getBody()->write((string)json_encode($testimonials));
      return $response->withHeader('Content-Type','application/json');
    }
}