<?php
namespace App\Domain\Sliders;

use App\Domain\Sliders\SlidersRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Sliders
{ 
  /**
   * @var SlidersRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param SlidersRepository $repository The repository
   */
  public function __construct(SlidersRepository $repository){
    $this->repository = $repository;
  }
 
  public function addSlider($data){
    $result = $this->repository->addSlider($data);
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
 
  public function updateSlider($data){
    $result = $this->repository->updateSlider($data);
    return $result;
  } 

  public function deleteSlider($data){
    $result = $this->repository->deleteSlider($data);
    return $result;
  }
 


}