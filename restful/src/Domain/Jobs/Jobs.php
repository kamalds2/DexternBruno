<?php
namespace App\Domain\Jobs;

use App\Domain\Jobs\JobsRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Jobs
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
  public function __construct(JobsRepository $repository){
    $this->repository = $repository;
  }
 
  public function addJob($data){
    $result = $this->repository->addJob($data);
    return $result;
  }
  
  public function getAllJobs($data){
    $result = $this->repository->getAllJobs($data);
    return $result;
  }
 
  public function getJobDetails($data){
    $result = $this->repository->getJobDetails($data);
    return $result;
  }
 
  public function updateJob($data){
    $result = $this->repository->updateJob($data);
    return $result;
  }
 
  public function deleteJob($data){
    $result = $this->repository->deleteJobs($data);
    return $result;
  }
 


}