<?php
namespace App\Domain\Pages;

use App\Domain\Pages\PagesRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Pages
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
  public function __construct(PagesRepository $repository){
    $this->repository = $repository;
  }
 
  public function addPage($data){
    $result = $this->repository->addPage($data);
    return $result;
  }
  
  public function getAllPages($data){
    $result = $this->repository->getAllPages($data);
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
 
  public function deletePage($data){
    $result = $this->repository->deletePage($data);
    return $result;
  }
 


}