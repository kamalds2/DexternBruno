<?php
namespace App\Domain\Users;

use App\Domain\Users\UsersRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Users
{ 
  /**
   * @var UsersRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param UsersRepository $repository The repository
   */
  public function __construct(UsersRepository $repository){
    $this->repository = $repository;
  }
 
  public function checkLogin($data){
    $result = $this->repository->checkLogin($data);
    return $result;
  }
 
  public function getUsers($data){
    $result = $this->repository->getUsers($data);
    return $result;
  }

  public function getUserName($data){
    $result = $this->repository->getUserName($data);
    return $result;
  }

  public function getCustomers($data){
    $result = $this->repository->getCustomers($data);
    return $result;
  }

  public function addUser($data){
    $result = $this->repository->addUser($data);
    return $result;
  }

  public function editUser($data){
    $result = $this->repository->editUser($data);
    return $result;
  }

  public function deleteUser($data){
    $result = $this->repository->deleteUser($data);
    return $result;
  }

  public function checkUserName($data){
    $result = $this->repository->checkUserName($data);
    return $result;
  }

  public function checkUserEmail($data){
    $result = $this->repository->checkUserEmail($data);
    return $result;
  }

  public function getUserDetails($data){
    $result = $this->repository->getUserDetails($data);
    return $result;
  }

  public function checkPassword($data){
    $result = $this->repository->checkPassword($data);
    return $result;
  }
  
  public function updatePassword($data){
    $result = $this->repository->updatePassword($data);
    return $result;
  } 

  public function checkEmail($data){
    $result = $this->repository->checkEmail($data);
    return $result;
  }
  
  public function getUserEmailDetails($data){
    $result = $this->repository->getUserEmailDetails($data);
    return $result;
  }

  public function updateProfileDetails($data){
    $result = $this->repository->updateProfileDetails($data);
    return $result;
  }
  
  public function getSiteSettings($data){
    $result = $this->repository->getSiteSettings($data);
    return $result;
  }

  public function updateSettingsDetails($data){
    $result = $this->repository->updateSettingsDetails($data);
    return $result;
  }


}
