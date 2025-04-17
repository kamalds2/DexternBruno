<?php
namespace App\Domain\Roles;

use App\Domain\Roles\RolesRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Roles
{ 
  /**
   * @var RolesRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param RolesRepository $repository The repository
   */
  public function __construct(RolesRepository $repository){
    $this->repository = $repository;
  }
 
  public function getRoles($data){
    $result = $this->repository->getRoles($data);
    return $result;
  }
  
  public function addRole($data){
    $result = $this->repository->addRole($data);
    return $result;
  }
  
  public function editRole($data){
    $result = $this->repository->editRole($data);
    return $result;
  }
  
  public function accessPages($data){
    $result = $this->repository->accessPages($data);
    return $result;
  }
 
  public function getPrivileges($data){
    $result = $this->repository->getPrivileges($data);
    return $result;
  }
 
  public function getModules($data){
    $result = $this->repository->getModules($data);
    return $result;
  }
 


}