<?php
namespace App\Domain\Menus;

use App\Domain\Menus\MenusRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Menus
{ 
  /**
   * @var MenusRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param MenusRepository $repository The repository
   */
  public function __construct(MenusRepository $repository){
    $this->repository = $repository;
  }
  
  public function getAllMenus($data){
    $result = $this->repository->getAllMenus($data);
    
    return $result;
  }
 
  public function getAllPages($data){
    $result = $this->repository->getAllPages($data);
    //var_dump($data);
    //die();
    return $result;
  }
 
  public function getAllModules($data){
    $result = $this->repository->getAllModules($data);
    //var_dump($data);
    //die();
    return $result;
  } 
  
  public function addMenuDetails($data){
    $result = $this->repository->addMenuDetails($data);
    //var_dump($data);
    //die();
    return $result;
  } 
  
  public function getMenuDetails($data){
    $result = $this->repository->getMenuDetails($data);
    
    return $result;
  }
 
  public function deleteMenuItems($data){
    $result = $this->repository->deleteMenuItems($data);
    return $result;
  }
 
 
  public function updateMenuDetails($data){
    $result = $this->repository->updateMenuDetails($data);
    
    return $result;
  }
 
 
  
 


}