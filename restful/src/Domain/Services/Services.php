<?php
namespace App\Domain\Services;

use App\Domain\Services\ServicesRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Services
{ 
  /**
   * @var PagesRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param PagesRepository $repository The repository
   */
  public function __construct(ServicesRepository $repository){
    $this->repository = $repository;
  }
 
  public function addPage($data){
    $result = $this->repository->addPage($data);
    return $result;
  }
   public function addHomePage($data){
    $result = $this->repository->addHomePage($data);
    return $result;
  }
  
  public function getAllPages($data){
    $result = $this->repository->getAllPages($data);
    return $result;
  }

  
  public function getAllHomePages($data){
    $result = $this->repository->getAllHomePages($data);
    return $result;
  }
 
  public function getPageDetails($data){
    $result = $this->repository->getPageDetails($data);
    return $result;
  }
 
  public function updatePage($data){
    $result = $this->repository->updatePage($data);
    return $result;
  }

  public function updateHomePage($data){
    $result = $this->repository->updateHomePage($data);
    return $result;
  }
 
  public function deletePage($data){
    $result = $this->repository->deletePage($data);
    return $result;
  }
 


}