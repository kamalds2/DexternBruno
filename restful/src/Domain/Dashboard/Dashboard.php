<?php
namespace App\Domain\Dashboard;

use App\Domain\Dashboard\DashboardRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Dashboard
{ 
  /**
   * @var DashboardRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param DashboardRepository $repository The repository
   */
  public function __construct(DashboardRepository $repository){
    $this->repository = $repository;
  }
 
  public function getDashboardEnquiries($data){
    $result = $this->repository->getDashboardEnquiries($data);
    return $result;
  }
  
  public function getDashboardPages($data){
    $result = $this->repository->getDashboardPages($data);
    return $result;
  }
   
  public function getDashboardSliders($data){
    $result = $this->repository->getDashboardSliders($data);
    return $result;
  }
   
  public function getDashboardCount($data){
    $result = $this->repository->getDashboardCount($data);
    return $result;
  }
  
  
 


}