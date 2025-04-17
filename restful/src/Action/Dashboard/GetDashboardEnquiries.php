<?php

  namespace App\Action\Dashboard;

  use App\Domain\Dashboard\Dashboard;
  use Psr\Http\Message\ResponseInterface;
  use Psr\Http\Message\ServerRequestInterface;

  final class GetDashboardEnquiries
  {
    private $dashboard;
    public function __construct(Dashboard $dashboard)
    {
      $this->dashboard = $dashboard; 
    }
    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response,$args
      ): ResponseInterface
      {
          
        $dashboard = $this->dashboard->getDashboardEnquiries($args);
        $response->getBody()->write((string)json_encode($dashboard));
        return $response->withHeader('Content-Type','application/json');
      }
  }