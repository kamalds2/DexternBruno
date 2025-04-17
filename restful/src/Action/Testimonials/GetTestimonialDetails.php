<?php

namespace App\Action\Testimonials;

use App\Domain\Testimonials\Testimonials;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetTestimonialDetails
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
       
      $testimonials = $this->testimonials->getTestimonialDetails($args);
      $response->getBody()->write((string)json_encode($testimonials));
      return $response->withHeader('Content-Type','application/json');
    }
}