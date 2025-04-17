<?php
namespace App\Domain\TravelBunny;

use App\Domain\TravelBunny\TravelBunnyRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class TravelBunny
{ 
  /**
   * @var TravelBunnyRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param TravelBunnyRepository $repository The repository
   */
  public function __construct(TravelBunnyRepository $repository){
    $this->repository = $repository;
  }
 
   
  public function getAllMenus($data){
    $result = $this->repository->getAllMenus($data);
    return $result;
  }
   public function getAllFooterMenus($data){
    $result = $this->repository->getAllFooterMenus($data);
    
    return $result;
  }
 
 
  public function getAllSliders($data){
    $result = $this->repository->getAllSliders($data);
    return $result;
  } 
 
  public function getSliderDetails($data){
    $result = $this->repository->getSliderDetails($data);
    return $result;
  }

 
  public function getAllTestimonials($data){
    $result = $this->repository->getAllTestimonials($data);
    return $result;
  }
 

 
  public function  getAllJobs(){
    $result = $this->repository->getAllJobs();
    return $result;
  }

 public function  getAllJobDetails($data){
    $result = $this->repository->getAllJobDetails($data);
    return $result;
  }
  public function getPageDetails($data){
    $result = $this->repository->getPageDetails($data);
    return $result;
  }
  
  public function getModuleDetails($data){
    $result = $this->repository->getModuleDetails($data);
    return $result;
  }
  
  public function getSettingsData($data){
    $result = $this->repository->getSettingsData($data);
    return $result;
  }
  
  public function getHomePageDetails($data){
    $result = $this->repository->getHomePageDetails($data);
    return $result;
  }
 

 public function getAllHomeServices($data){
    $result = $this->repository->getHomePageServices($data);
    return $result;
  }

}